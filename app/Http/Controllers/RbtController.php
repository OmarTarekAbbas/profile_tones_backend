<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Content;
use App\Country;
use App\Operator;
use App\RbtCode;
use App\Provider;

use Validator;
use Auth;

class RbtController extends Controller
{
    public function __construct()
    {
      $this->get_privilege();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('rbt.index');
    }


    public function allData(Request $request)
    {
        // dd($request);
        if(isset($request->content_id)){
            $contents = RbtCode::select('*','rbt_codes.image as image_rbt','countries.title as title_country' , 'rbt_codes.id as rbt_codes_id')
            ->join('operators', 'operators.id', '=', 'rbt_codes.operator_id')
            ->join('countries', 'countries.id', '=', 'operators.country_id')
            ->join('contents', 'contents.id', '=', 'rbt_codes.content_id')
            ->where('rbt_codes.content_id', $request->content_id)
            ->get();
        }else{
            $contents = RbtCode::select('*','rbt_codes.image as image_rbt','countries.title as title_country' , 'rbt_codes.id as rbt_codes_id')
            ->join('operators', 'operators.id', '=', 'rbt_codes.operator_id')
            ->join('countries', 'countries.id', '=', 'operators.country_id')
            ->join('contents', 'contents.id', '=', 'rbt_codes.content_id')
            ->get();
        }
// dd($contents);

            return \DataTables::of($contents)
                ->addColumn('index', function(RbtCode $content) {
                    return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$content->id}}" class="roles" onclick="collect_selected(this)">';
                })
                ->addColumn('title', function(RbtCode $content) {
                    return $content->title;
                })
                ->addColumn('rbt_code', function(RbtCode $content) {
                    return $content->rbt_code;
                })
                ->addColumn('Operator_name', function(RbtCode $content) {
                    return '<span class="btn">'.$content->title_country ."-". $content->name.'</span>';
                })
                ->addColumn('image', function(RbtCode $content) {
                    return '<img src="'.url('uploads/image_rbt/'.$content->image_rbt).'" style="width:25%" alt="'.$content->title.'">';
                })
            ->addColumn('action', function(RbtCode $content) {
            $value = $content;
            return view('rbt.c_inner', compact('value'))->render();
        })
        ->escapeColumns([])
        ->make(true);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contents  = Content::where('content_type_id', 4)->get();
        $operators = Operator::all();
        //$providers = Provider::all();
        $rbt      = NULL;
        return view('rbt.form', compact('contents', 'operators', 'rbt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'rbt_code' => 'required',
            'content_id' => 'required',
            'operator_id' => 'required',
            'image' => 'required'
        ]);
        //$content  = Content::create($request->all());
        $content = Content::findOrFail($request->content_id);
        // $count = count($request->image);
        // for ($i = 0; $i < $count; $i++) {
        //     if (!empty($request->image[$i])) {
        //         if ($request->image[$i]->isValid()) {
        //             try {
        //                 $image = time() . rand(0, 999) .'.' . $request->image[$i]->getClientOriginalExtension();
        //                 $request->image[$i]->move('uploads/image_rbt', $image);
        //                 $content->image = $image;
        //             } catch (Illuminate\Filesystem\FileNotFoundException $e) {

        //             }
        //         }
        //     }
        // }

        foreach ($request->operator_id as  $key => $operator_id) {
            if (!empty($request->image[$key])) {
                if ($request->image[$key]->isValid()) {
                    try {
                        $image = time() . rand(0, 999) .'.' . $request->image[$key]->getClientOriginalExtension();
                        $request->image[$key]->move('uploads/image_rbt', $image);
                        $content->image = $image;
                    } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                    }
                }
            }
            $content->rbt_operators()->attach([$operator_id => ['rbt_code' => $request->rbt_code[$key] , 'image' => $image]]);
            // dd('here');
        }

        // $rbt = new RbtCode();
        // $rbt->rbt_code = $request->rbt_code[$key];
        // $rbt->content_id = $content->id;
        // $rbt->provider_id = $pro_id;
        // $rbt->operator_id = $request->operator_id[$key];
        // //dd($pro_id);
        // $rbt->save();


        \Session::flash('success', 'rbt created Successfully');
        return redirect('rbt/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents =  Content::whereId($id)->get();
        return view('rbt.index', compact('contents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $rbt = RbtCode::findOrFail($id);
        $contents = Content::where('content_type_id', 4)->get();
        $operators = Operator::all();
        return view('rbt.form', compact('rbt', 'contents', 'operators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rbt_code' => 'required',
            'content_id' => 'required',
            'operator_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $rbt = RbtCode::findOrFail($id);
        $content = Content::findOrFail($request->content_id);
        $rbt->rbt_code = $request->rbt_code;
        $rbt->content_id = $content->id;
        $rbt->operator_id = $request->operator_id;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $imageName = time() . rand(0, 999) .'.' . $request->image->getClientOriginalExtension();
                    $request->image->move('uploads/image_rbt', $imageName);
                    $rbt->image = $imageName;
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }
        $rbt->save();
        \Session::flash('success', 'RbtCode Update Successfully');
        return redirect('rbt/' . $request->content_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $rbt = RbtCode::findOrFail($id);
        $rbt->delete();
        \Session::flash('success', 'RbtCode Delete Successfully');
        return back();
    }
}
