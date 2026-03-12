<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Room;
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

    public function room(Room $room){
        $rooms = Room::all();
        return view('room',compact('rooms'));
    }

    public function gallery(){
        return view('gallery');
    }

    public function blog(){
        $blogs = Blog::all();
        return view('blog',compact('blogs'));
    }

    public function contact(){
        return view('contact');
    }
        public function room_details(Room $room){
        $room = Room::findOrFail($room->id);
        return view('admin.room_details',compact('room'));
    }
}
