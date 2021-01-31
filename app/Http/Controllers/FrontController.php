<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RbtCode;
use Illuminate\Support\Facades\File;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Facades\Session;


class FrontController extends Controller
{

    public function index()
    {
        $get_content_from_rbt_for_indexs = RbtCode::select('*','rbt_codes.image as image_rbt')
        ->join('contents', 'contents.id', '=', 'rbt_codes.content_id')
        ->join('operators', 'operators.id', '=', 'rbt_codes.operator_id')
        ->where('operators.id', request()->get('op'))
        ->get();
        return view('front.index',compact("get_content_from_rbt_for_indexs"));
    }
}
