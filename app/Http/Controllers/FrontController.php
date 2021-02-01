<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RbtCode;
use App\Helpers\Helper;



class FrontController extends Controller
{

    public function index()
    {
        $get_content_from_rbt_for_indexs = RbtCode::select('*','rbt_codes.image as image_rbt')
        ->join('contents', 'contents.id', '=', 'rbt_codes.content_id')
        ->join('operators', 'operators.id', '=', 'rbt_codes.operator_id')
        ->where('operators.id', request()->get('op'))
        ->get();
        $zain_kuwait = Helper::zain_kuwait();
        $du_kuwait = Helper::du_kuwait();
        return view('front.index',compact("get_content_from_rbt_for_indexs",'zain_kuwait','du_kuwait'));
    }
}
