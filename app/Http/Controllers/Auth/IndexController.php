<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }
}
