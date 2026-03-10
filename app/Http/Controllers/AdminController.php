<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;

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

        $data['image'] = $request->file('image')->store('rooms','public');

        Room::create($data);
        return redirect(route('admin.view_rooms'));
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
        return redirect(route('admin.view_rooms'));
    }

    public function edit(Room $room){
        return view('admin.edit',compact('room'));
    }

    public function update_room(Request $request, Room $room){
        $data = $request->validate([
            'room_title'=>'nullable',
            'image'=>'nullable | mimes:jpg,jpeg,png',
            'description'=>'nullable',
            'price'=>'required',
            'wifi'=>'required',
            'room_type'=>'required'
        ]);

        if($request->hasFile('image')){
            if($room->image){
                Storage::disk('public')->delete($room->image);
            }
            $data['image'] = $request->file('image')->store('rooms','public');
        }

        $room->update($data);
        return redirect(route('admin.view_rooms'));
    }
    public function booking(Request $request){
        $data = $request->validate([
                "name"=> "required | string | max: 20",
                "email"=> "required",
                "phone"=> "required",
                "start_date" => "required | date",
                "end_date" => "required | date",
        ]);

        Booking::create($data);
        return redirect(route("room"));
    }

}
