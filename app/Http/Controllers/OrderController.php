<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function OrderView(){
        // return view('order',['name'=>'anil']);
        // $name="this is my first order";
        // return view('order',compact('name'));
        // return view('order')->with('name',$name);
        $data=['aakash','ankit','rahul','sunil'];
        return view('order',['user'=>$data]);

    }
}
