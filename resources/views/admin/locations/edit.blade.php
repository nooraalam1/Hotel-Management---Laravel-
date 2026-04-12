@extends('admin.partials.app')
@section('title', 'Edit Location')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Location | Edit Location</h2>
                <a href="{{ route('admin.viewlocations') }}" class="btn btn-info">View Location</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom ">
            <form action="{{route('admin.updatelocation',['id'=>$location->id])}}" method="POST" class="">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="col-6 p-0">
                        <label>District</label>
                        <select name="district" id="district" class="form-control" required >
                            <option value="">Select</option>
                            @foreach ($districts as $district)
                                <option  value="{{ $district->id }}">{{ $district->district_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 p-0">
                        <label class="">Division</label>
                        <input type="text" name="division" class="form-control" id="division" readonly placeholder="Auto Fill" value="{{$location->division}}">
                    </div>
                    <div class="col-6 p-0 ">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" required placeholder="Road:07, Block:J, Baridhara, Dhaka" value="{{$location->location}}">
                    </div>
                    <div class="col-6 p-0">
                        <label>Location Manager Mobile</label>
                        <input type="phone" name="phone" class="form-control" required placeholder="+88 017XXXXXXXX" value="{{$location->phone}}">
                    </div>
                    <div class="col-6 p-0">
                        <label>Location Manager Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="example@mail.com" value="{{$location->email}}">
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" value="Add Location" class="btn btn-primary mt-4">
                </div>
            </form>
        </section>
    </div>
    <script>
        $(document).ready(function(){
            $('#district').on('change',function(){
                var disId = $(this).val();
                if(disId){
                    $.ajax({
                        url:'/admin/get-district/'+disId,
                        type:'get',
                        success:function(data){
                            $('#division').val(data.division_name);
                        }
                    })
                }
            })
        })
    </script>
@endsection
