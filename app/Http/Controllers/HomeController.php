<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }
    public function register(){
        return view("user.register");
    }
    public function login(){
        return view("user.login");
    }
    public function detail($id){
        return view("detail");
    }
}
