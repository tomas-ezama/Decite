<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('index');
    }
    public function faq(){
        return view('faq');
    }
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
   
}
