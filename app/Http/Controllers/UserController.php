<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function home(){
        $heros = Hero::all();
        return view('home',compact('heros'));
    }

    public function about(){
        $facilities = Facility::all();
        return view('about',compact('facilities'));
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
    public function locations(){
        $locations = Location::latest()
                    ->get()
                    ->unique('location');
        return view('locations',compact('locations'));
    }
    public function hotelsInDivision($id){
        $location = Location::findOrFail($id);
        // $hotels = Location::whereDivision($location->division)->get();
        $hotels = Location::where('division',$location->division)->get();
        // dd($hotels);
        return view('divisionHotel',compact(['location','hotels']));
    }
}
