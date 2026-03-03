<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function addRoom()
    {
        return view('admin.addRoom');
    }

    public function add_room(Request $request){
        $data = $request->validate([
            'room_title'=>'required',
            'image'=>'required | mimes:jpg,jpeg,png',
            'description'=>'nullable',
            'price'=>'required',
            'wifi'=>'required',
            'room_type'=>'required'
        ]);

        // if($request->hasFile('image')){

        //     $imgPath = $request->file('image')->store('rooms','public');
        //     $data['image'] = $imgPath;
        // }
        $data['image'] = $request->file('image')->store('rooms','public');

        $store = Room::create($data);
        return redirect(route('admin.dashboard'));
    }

    public function view_rooms(){
        $rooms = Room::all();
        return view('admin.view_rooms',compact('rooms'));
    }
    public function delete(Room $room){
        $imgPath = public_path('storage/'.$room->image);
        if(file_exists($imgPath)){
            unlink($imgPath);
        }
        $room->delete();
        return redirect(route('admin.dashboard'));
    }
}
