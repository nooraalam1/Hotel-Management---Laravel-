<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Booking;
use App\Models\District;
use App\Models\Division;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

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

        $data['image'] = $request->file('image')->store('rooms', 'public');

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
        return view('admin.viewblog', compact('blogs'));
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

    public function editBlog(Blog $blog)
    {
        return view('admin.editblog', compact('blog'));
    }
    public function updateBlog(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png',
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
        return redirect()->route('admin.viewblog')->with('success', 'Blog Updated Successfully');
    }

    public function deleteBlog(Blog $blog)
    {
        $imgPath = public_path('storage/' . $blog->image);
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
        $blog->delete();
        return redirect()->route('admin.viewblog')->with('success', 'Deleted Successfully');
    }
    public function addlocation()
    {
        $districts = District::all();
        $divisions = Division::all();
        return view('admin.locations.add', compact(['districts', 'divisions']));
    }
    public function viewlocations()
    {
        $locations = Location::latest()->paginate(10);
        return view('admin.locations.view', compact('locations'));
    }
    public function createlocation(Request $request)
    {
        $data = $request->validate([
            "location" => ["required", "string"],
            "district" => ["required", "string"],
            "division" => ["required"],
            "phone" => ["required", "string"],
            "email" => ["required", "string"],
        ]);
        Location::create($data);
        return redirect()->route('admin.viewlocations')->with('success', 'Location Added Successfully');
    }
    public function deletelocation($id)
    {
        $data = Location::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.viewlocations')->with('success', 'Location Deleted Successfully');
    }
    public function editlocation($id)
    {
        $location = Location::findOrFail($id);
        $districts = District::all();
        return view('admin.locations.edit', compact('location','districts'));
    }
    public function updatelocation(Request $request, $id)
    {
        $data = $request->validate([
            "location" => ["required", "string"],
            "district" => ["required", "string"],
            "division" => ["required"],
            "phone" => ["required", "string"],
            "email" => ["required", "string"],
        ]);
        $location = Location::findOrFail($id);
        $location->update($data);
        return redirect()->route('admin.viewlocations')->with('success', 'Location Updated Successfully');
    }
    public function addfacility()
    {
        return view('admin.facilities.add');
    }
    public function viewfacility()
    {
        $facilities = Facility::latest()->paginate(5);

        return view('admin.facilities.view', compact('facilities'));
    }

    public function createFacility(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,jpeg,png,svg', 'image'],
        ]);

        $data['image'] = $request->file('image')->store('facility', 'public');
        Facility::create($data);
        return redirect()->route('admin.viewfacility')->with('success', 'Facility Added Successfully');
    }

    public function deleteFacility($id)
    {
        $data = Facility::findOrFail($id);
        $imgPath = public_path(('storage/' . $data->image));

        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
        $data->delete();
        return redirect()->route('admin.viewfacility')->with('success', 'Facility Deleted Successfully');
    }

    public function editFacility($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }
    public function updateFacility(Request $request, $id)
    {
        $data = Facility::findOrFail($id);
        $facility = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['mimes:jpg,jpeg,png,svg', 'image'],
        ]);
        if ($request->hasFile('image')) {
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }
        }
        $facility['image'] = $request->file('image')->store('facility', 'public');

        $data->update($facility);
        return redirect()->route('admin.viewfacility')->with('success', 'Facility Updated');
    }
    public function getDistrict($id){
        $district = District::findOrFail($id);
        // dd($district->district_name,$district->division->division_name);
        return response()->json([
            'district_name'=>$district->district_name,
            'division_name'=>$district->division->division_name,
        ]);
    }
    public function addHotel(){
        $locations = Location::all();
        return view('admin.hotels.add',compact('locations'));
    }

    public function createHotel(Request $request){
        $hotel = $request->validate([
            'title'=>['required','string','max:300'],
            'location'=>['required','string'],
            'image'=>['nullable','mimes:png,jpg,jpeg,svg'],
            'phone'=>['required'],
            'email'=>['required'],
            'status'=>['required']
        ]);
        $hotel['image']= $request->file('image')->store('hotels','public');
        Hotel::create($hotel);
        return redirect()->route('admin.viewHotels')->with('success','Hotel Added Successfully');
    }
    public function viewHotels(){
        $hotels = Hotel::all();
        return view('admin.hotels.view',compact('hotels'));
    }
    public function deleteHotel($id){
        $data = Hotel::findOrFail($id);
        $imgPath = public_path('storage/'.$data->image);
        if($data->image){
            unlink($imgPath);
        }
        $data->delete();
        return redirect()->route('admin.viewHotels')->with('success','Hotel Deleted Successfully');
    }
    public function editHotel($id){
        $locations = Location::all();
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.edit',compact('hotel','locations'));
    }
    public function updateHotel(Request $request, $id){
        $data = Hotel::findOrFail($id);
        $hotel = $request->validate([
            'title'=>['required','string','max:300'],
            'location'=>['required','string'],
            'image'=>['nullable','mimes:png,jpg,jpeg,svg'],
            'phone'=>['required'],
            'email'=>['required'],
            'status'=>['required']
        ]);
        if($request->hasFile('image')){
            if($data->image){
                unlink(public_path('storage/'.$data->image));
                // Storage::disk('public')->delete($data->image);
            }
        }
        $hotel['image']=$request->file('image')->store('hotels','public');
        $data->update($hotel);
        return redirect()->route('admin.viewHotels')->with('success','Hotel Updated Successfully');
    }
    public function trashedHotels(){
        $hotels=Hotel::onlyTrashed()->get();
        return view('admin.hotels.trash',compact('hotels'));
    }
}
