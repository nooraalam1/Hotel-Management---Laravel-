@extends('admin.partials.app')
@section('title', 'View Locations')
@section('content')
    <div class="page-content">
        <x-alerts/>
            <div class="page-header">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <h2 class="h3">Location | Deleted Locations</h2>
                    <a href="{{ route('admin.addlocation') }}" class="btn btn-info">Add Location</a>
                </div>
            </div>
            @if ($locations->count()>0)
                <table class="table text-center">
                <tr>
                    <th>SL</th>
                    <th>Location</th>
                    <th>Division</th>
                    <th>Manager Mobile</th>
                    <th>Manager Email</th>
                    <th>Action</th>
                </tr>
                @foreach ($locations as $key => $location)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $location->location }}</td>
                        <td>{{ $location->division }}</td>
                        <td>{{ $location->phone }}</td>
                        <td>{{ $location->email }}</td>
                        <td class="d-flex justify-content-center " style="gap: 10px">
                            <form action="{{route('admin.restoreLocation',['id'=>$location->id])}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <input class="btn btn-info mb-3 col" type="submit" value="Restore"
                                        onclick="return confirm('Are You Sure?')">
                                </form>
                                <form action="{{route('admin.permanentDelete',['id'=>$location->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning col" type="submit" value="Permanent Delete"
                                        onclick="return confirm('Are You Sure?')">
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
                @else
                    <h1 class="text-danger text-center">Nothing Found!</h1>
            @endif

    </div>
@endsection
