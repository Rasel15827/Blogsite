<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function main(){
        return view('home');
    }
    function blog(){
        return view('blog');
    }
    function contact(){
        return view('contact');
    }
}
