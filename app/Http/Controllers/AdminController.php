<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Booking;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
Paginator::useBootstrap();

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

    public function add_room(Request $request)
    {
        $data = $request->validate([
            'room_title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'description' => 'nullable',
            'price' => 'required',
            'wifi' => 'required',
            'room_type' => 'required'
        ]);

        $data['image'] = $request->file('image')->store('rooms','public');

        Room::create($data);
        return redirect(route('admin.view_rooms'));
    }

    public function view_rooms()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.view_rooms', compact('rooms'));
    }
    public function delete(Room $room)
    {
        $imgPath = public_path('storage/' . $room->image);
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
        $room->delete();
        return redirect(route('admin.view_rooms'));
    }

    public function edit(Room $room)
    {
        return view('admin.edit', compact('room'));
    }

    public function update_room(Request $request, Room $room)
    {
        $data = $request->validate([
            'room_title' => 'nullable',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'description' => 'nullable',
            'price' => 'required',
            'wifi' => 'required',
            'room_type' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $data['image'] = $request->file('image')->store('rooms', 'public');
        }

        $room->update($data);
        return redirect(route('admin.view_rooms'));
    }
    public function booking(Request $request, Room $room)
    {
        $data = $request->validate([
            "name" => "required|string| max: 20",
            "email" => "required",
            "phone" => "required",
            "start_date" => "required|date|after_or_equal:today",
            "end_date" => "required|date|after:start_date",
        ]);
        $data["room_id"] = $room->id;
        $exists = Booking::where('room_id', $room->id)
            ->where('start_date', '<=', $request->end_date)
            ->where('end_date', '>=', $request->start_date)
            ->exists();
        if ($exists) {
            return redirect()->back()->with('error', 'Selected Dates are not Available! ');
        } else {
            Booking::create($data);
            return redirect(route("room"))->with('success', "Booking is Pending! A Confirmation Email will be sent to you after approval.");
        }
    }
    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }
    public function booking_approve($id)
    {
        $data = Booking::findOrFail($id)->update([
            "status" => "approved",
        ]);

        return redirect(route('admin.bookings'));
    }
    public function booking_reject($id)
    {
        $data = Booking::findOrFail($id)->update([
            "status" => "rejected",
        ]);
        return redirect(route('admin.bookings'));
    }
    public function banner()
    {
        return view('admin.banner');
    }
    public function gallery()
    {
        return view('admin.gallery');
    }
    public function addblog()
    {
        return view('admin.addblog');
    }
    public function viewblog()
    {
        $blogs = Blog::all();
        return view('admin.viewblog',compact('blogs'));
    }
    public function addABlog(Request $request)
    {
        $blog = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'nullable|max:50',
            'tagline' => 'nullable',
            'description' => 'nullable|max:500',
        ]);
        if ($request->hasFile('image')) {
            $blog['image'] = $request->file('image')->store('blogs', 'public');
        }
        Blog::create($blog);
        return redirect()->route('admin.viewblog')->with('success', 'Blog Added Successfully');
    }

    public function editBlog(Blog $blog){
        return view('admin.editblog',compact('blog'));
    }
    public function updateBlog(Request $request, Blog $blog){
        $data = $request->validate([
            'image'=>'nullable|mimes:jpg,jpeg,png',
            'title' => 'nullable|max:50',
            'tagline' => 'nullable',
            'description' => 'nullable|max:500',
        ]);
        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->update($data);
        return redirect()->route('admin.viewblog')->with('success','Blog Updated Successfully');
    }

    public function deleteBlog(Blog $blog){
        $imgPath = public_path('storage/'.$blog->image);
        if (file_exists($imgPath)){
            unlink($imgPath);
        }
        $blog->delete();
        return redirect()->route('admin.viewblog')->with('success','Deleted Successfully');

    }
    public function addlocation(){
        return view('admin.locations.add');
    }
    public function viewlocations(){
        $locations = Location::latest()->paginate(10);
        return view('admin.locations.view',compact('locations'));
    }
    public function createlocation(Request $request){
        $data = $request->validate([
            "location"=>["required","string"],
            "phone"=>["required","string"],
            "email"=>["required","string"],
            "division"=>["required"],
        ]);

        Location::create($data);
        return redirect()->route('admin.viewlocations')->with('success','Location Added Successfully');
    }
    public function deletelocation($id){
        $data = Location::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.viewlocations')->with('success','Location Deleted Successfully');
    }
    public function editlocation($id){
        $location = Location::findOrFail($id);
        return view('admin.locations.edit',compact('location'));
    }
    public function updatelocation(Request $request,$id){
        $data = $request->validate([
            "location"=>["required","string"],
            "hotel_name"=>["required","string"],
            "division"=>["required"],
        ]);
    $location = Location::findOrFail($id);
    $location->update($data);
    return redirect()->route('admin.viewlocations')->with('success','Location Updated Successfully');
    }
    public function addfacility(){
        return view('admin.facilities.add');
    }
    public function viewfacility(){
        return view('admin.facilities.view');
    }
    
}
