<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function room(){
        return view('room');
    }

    public function gallery(){
        return view('gallery');
    }

    public function blog(){
        return view('blog');
    }
    
    public function contact(){
        return view('contact');
    }
}
