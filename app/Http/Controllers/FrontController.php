<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{
    public function getHome() {        
        return view('index');
    }
}
