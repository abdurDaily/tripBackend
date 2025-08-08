<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //*INDEX
    public function index(){
        return view('backend.blogs.index');
    }
}
