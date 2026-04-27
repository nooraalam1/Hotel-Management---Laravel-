<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Booking;
use App\Models\District;
use App\Models\Division;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use DB;
Paginator::useBootstrap();

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function addRoom()
    {
        $facilities = Facility::all();
        $hotels     = Hotel::all();
        return view('admin.rooms.addRoom', compact('facilities', 'hotels'));
    }

    public function add_room(Request $request)
    {
        try{
        DB::beginTransaction();
            $room = $request->validate([
                'location_id' => ['nullable'],
                'hotel_id'    => ['nullable'],
                'hotel_title' => ['required'],
                'image'       => ['required', 'mimes:jpg,jpeg,png,svg'],
                'description' => ['nullable'],
                'room_type'   => ['required'],
                'facility'    => ['required', 'array'],
                'facility.*'  => ['string'],
                'room_number' => ['required'],
                'status'      => ['required'],
                'bed_type'    => ['required'],
                'price'       => ['required'],
            ]);
            $data                = Hotel::findOrFail($room['hotel_title']);
            $room['hotel_id']    = $data->id;
            $room['location_id'] = $data->location_id;
            $room['facility']    = json_encode($room['facility']);
            $room['image']       = $request->file('image')->store('rooms', 'public');
            Room::create($room);
            DB::commit();
            return redirect()->route('admin.view_rooms');
        }
        catch(\Exception $e){
           DB::rollBack(); 
           return back()->with('error',$e->getMessage());
        }
    }

    public function view_rooms()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.view_rooms', compact('rooms'));
    }
    public function delete(Room $room)
    {
        try{
            DB::beginTransaction();
            $imgPath = public_path('storage/' . $room->image);
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
            $room->delete();
            DB::commit();
            return redirect()->route('admin.rooms.view_rooms');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }

    public function editRoom($id)
    {
        $room       = Room::findOrFail($id);
        $facilities = Facility::all();
        return view('admin.rooms.edit', compact('room', 'facilities'));
    }
    public function update_room(Request $request, $id)
    {
        try{
            DB::beginTransaction();
       
        $currentRoom = Room::findOrFail($id);
        $room = $request->validate([
            // 'location_id'=> ['nullable'],
            // 'hotel_id'=> ['nullable'],
            'hotel_title' => ['required'],
            'image'       => ['nullable', 'mimes:jpg,jpeg,png,svg'],
            'description' => ['nullable'],
            'room_type'   => ['required'],
            'facility'    => ['required', 'array'],
            'facility.*'  => ['string'],
            'room_number' => ['required'],
            'status'      => ['required'],
            'bed_type'    => ['required'],
            'price'       => ['required'],
        ]);
        $data   = Hotel::findOrFail($room['hotel_title']);
        $room['location_id'] = $data->location_id;
        $room['hotel_id'] = $data->id;
        $room['facility']    = json_encode($room['facility']);

        if($request->hasFile('image')){
            if($currentRoom->image && public_path('storage/'.$currentRoom->image)){
                unlink(public_path('storage/'.$currentRoom->image));
            }
        $room['image'] = $request->file('image')->store('rooms','public');
        }
        $currentRoom->update($room);
        DB::commit();
        return redirect()->route('admin.rooms.view_rooms')->with('success','Updated Successfully');
         }
         catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
         }
    }
    public function booking(Request $request, Room $room)
    {
        $data = $request->validate([
            "name"       => "required|string| max: 20",
            "email"      => "required",
            "phone"      => "required",
            "start_date" => "required|date|after_or_equal:today",
            "end_date"   => "required|date|after:start_date",
        ]);
        $data["room_id"] = $room->id;
        $exists          = Booking::where('room_id', $room->id)
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
    public function hero()
    {
        return view('admin.hero.index');
    }
    public function addHero(Request $request){
        try{
            DB::beginTransaction();
        
        $data = $request->validate([
            'image' => ['required','mimes: jpg,jpeg,png,svg','image'],
        ]);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('hero','public');
        }
        Hero::create($data);
        DB::commit();
        return redirect()->route('admin.viewHero')->with('success','Image Added Successfully');
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function viewHero(){
        $heros = Hero::paginate(5);
        return view('admin.hero.view',compact('heros'));
    }
    public function heroDelete($id){
        try{
            DB::beginTransaction();
            $data = Hero::findOrFail($id);
            $imgPath = public_path('storage/'.$data->image);
            if(file_exists($imgPath)){
                unlink($imgPath);
            }
            $data->delete();
            DB::commit();
            return redirect()->route('admin.viewHero')->with('success','Deleted Successfully!');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }
    public function addblog()
    {
        return view('admin.blogs.addblog');
    }
    public function viewblog()
    {
        $blogs = Blog::all();
        return view('admin.blogs.viewblog', compact('blogs'));
    }
    public function addABlog(Request $request)
    {
        try{
            DB::beginTransaction();
            $blog = $request->validate([
                'image'       => 'required|mimes:jpg,jpeg,png|max:2048',
                'title'       => 'nullable|max:50',
                'tagline'     => 'nullable',
                'description' => 'nullable|max:500',
            ]);
            if ($request->hasFile('image')) {
                $blog['image'] = $request->file('image')->store('blogs', 'public');
            }
            Blog::create($blog);
            DB::commit();
            return redirect()->route('admin.blogs.viewblog')->with('success', 'Blog Added Successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            return back()->with('error',$e->getMessage());
        }
    }

    public function editBlog(Blog $blog)
    {
        return view('admin.blogs.editblog', compact('blog'));
    }
    public function updateBlog(Request $request, Blog $blog)
    {
        try{
            DB::beginTransaction();
            $data = $request->validate([
                'image'       => 'nullable|mimes:jpg,jpeg,png',
                'title'       => 'nullable|max:50',
                'tagline'     => 'nullable',
                'description' => 'nullable|max:500',
            ]);
            if ($request->hasFile('image')) {
                if ($blog->image) {
                    Storage::disk('public')->delete($blog->image);
                }
                $data['image'] = $request->file('image')->store('blogs', 'public');
            }
            $blog->update($data);
            DB::commit();
            return redirect()->route('admin.blogs.viewblog')->with('success', 'Blog Updated Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }

    public function deleteBlog(Blog $blog)
    {
        try{
            DB::beginTransaction();
            $imgPath = public_path('storage/' . $blog->image);
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
            $blog->delete();
            DB::commit();
            return redirect()->route('admin.blogs.viewblog')->with('success', 'Deleted Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }

    //Location
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
        try{

            DB::beginTransaction();
            $data = $request->validate([
                "location" => ["required", "string"],
                "district" => ["required", "string"],
                "division" => ["required"],
                "phone"    => ["required", "string"],
                "email"    => ["required", "string"],
            ]);
            Location::create($data);
            DB::commit();
            return redirect()->route('admin.viewlocations')->with('success', 'Location Added Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }
    public function deletelocation($id)
    {
        try{
            DB::beginTransaction();
            $data = Location::findOrFail($id);
            $data->delete();
            DB::commit();
            return redirect()->route('admin.viewlocations')->with('success', 'Location Deleted Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }
    public function editlocation($id)
    {
        $location  = Location::findOrFail($id);
        $districts = District::all();
        return view('admin.locations.edit', compact('location', 'districts'));
    }
    public function updatelocation(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $data = $request->validate([
                "location" => ["required", "string"],
                "district" => ["required", "string"],
                "division" => ["required"],
                "phone"    => ["required", "string"],
                "email"    => ["required", "string"],
            ]);
            $location = Location::findOrFail($id);
            $location->update($data);
            DB::commit();
            return redirect()->route('admin.viewlocations')->with('success', 'Location Updated Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }
    public function trashedLocations()
    {
        $locations = Location::onlyTrashed()->get();
        return view('admin.locations.trash', compact('locations'));
    }
    public function restoreLocation($id)
    {
        try{
            DB::beginTransaction(){

            }
            $data = Location::onlyTrashed()->findOrFail($id);
            $data->restore();
            DB::commit();
            return redirect()->route('admin.trashedLocations')->with('success', 'Restored Successfully');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }
    public function permanentDelete($id)
    {
        try{
            DB::beginTransaction(){

            }
            $data = Location::onlyTrashed()->findOrFail($id);
            $data->forceDelete();
            DB::commit();
            return redirect()->route('admin.trashedLocations')->with('success', 'Permanently Deleted');
        }
        catch(\Exception $e){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }

    //Facility
    public function addfacility()
    {
        return view('admin.facilities.add');
    }
    public function viewfacility()
    {
        $facilities = Facility::all();

        return view('admin.facilities.view', compact('facilities'));
    }

    public function createFacility(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required', 'string'],
            'image' => ['required', 'mimes:jpg,jpeg,png,svg', 'image'],
        ]);

        $data['image'] = $request->file('image')->store('facility', 'public');
        Facility::create($data);
        return redirect()->route('admin.viewfacility')->with('success', 'Facility Added Successfully');
    }

    public function deleteFacility($id)
    {
        $data    = Facility::findOrFail($id);
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
        $data     = Facility::findOrFail($id);
        $facility = $request->validate([
            'name'  => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,svg', 'image'],
        ]);
        if ($request->hasFile('image')) {
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }
            $facility['image'] = $request->file('image')->store('facility', 'public');
        }

        $data->update($facility);
        return redirect()->route('admin.viewfacility')->with('success', 'Facility Updated');
    }
    public function getDistrict($id)
    {
        $district = District::findOrFail($id);
        // dd($district->district_name,$district->division->division_name);
        return response()->json([
            'district_name' => $district->district_name,
            'division_name' => $district->division->division_name,
        ]);
    }

    //Hotel
    public function addHotel()
    {
        $locations = Location::all();
        return view('admin.hotels.add', compact('locations'));
    }

    public function createHotel(Request $request)
    {
        $hotel = $request->validate([
            'location_id' => ['required'],
            'location'    => ['nullable'],
            'title'       => ['required', 'string'],
            'image'       => ['required', 'mimes:jpg,png,jpeg,svg'],
            'phone'       => ['required'],
            'email'       => ['required'],
            'status'      => ['required'],
        ]);
        $location          = Location::findOrFail($hotel['location_id']);
        $hotel['location'] = $location->location;
        $hotel['image']    = $request->file('image')->store('hotels', 'public');
        Hotel::create($hotel);

        return redirect()->route('admin.viewHotels')->with('success', 'Hotel Added Successfully');
    }
    public function viewHotels()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.view', compact('hotels'));
    }
    public function deleteHotel($id)
    {
        $data = Hotel::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.viewHotels')->with('success', 'Hotel Deleted Successfully');
    }
    public function editHotel($id)
    {
        $locations = Location::all();
        $hotel     = Hotel::findOrFail($id);
        return view('admin.hotels.edit', compact('hotel', 'locations'));
    }
    public function updateHotel(Request $request, $id)
    {
        $data  = Hotel::findOrFail($id);
        $hotel = $request->validate([
            'location_id' => ['required'],
            'location'    => ['nullable'],
            'title'       => ['required', 'string'],
            'image'       => ['nullable', 'mimes:jpg,png,jpeg,svg'],
            'phone'       => ['required'],
            'email'       => ['required'],
            'status'      => ['required'],
        ]);
        if ($request->hasFile('image')) {
            if ($data->image && file_exists(public_path('storage/' . $data->image))) {
                unlink(public_path('storage/' . $data->image));
            }
            $hotel['image'] = $request->file('image')->store('rooms', 'public');
        }
        $location          = Location::findOrFail($hotel['location_id']);
        $hotel['location'] = $location->location;

        $data->update($hotel);
        return redirect()->route('admin.viewHotels')->with('success', 'Hotel Updated Successfully');
    }

    public function trashedHotels()
    {
        $hotels = Hotel::onlyTrashed()->get();
        return view('admin.hotels.trash', compact('hotels'));
    }
    public function restoreTrashed($id)
    {
        Hotel::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.trashedHotels')->with('success', 'Restored Successfully');
    }
    public function permanentHotelDelete($id)
    {
        $data = Hotel::onlyTrashed()->findOrFail($id);
        unlink(public_path('storage/' . $data->image));
        $data->forceDelete();
        return redirect()->route('admin.trashedHotels')->with('success', 'Permanently Deleted');
    }
}