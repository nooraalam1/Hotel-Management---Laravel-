@extends('admin.partials.app')
@section('title', 'View Locations')
@section('content')
    <div class="page-content">
        <x-alerts />
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h3">Location | View Locations</h2>
                <a href="{{ route('admin.addlocation') }}" class="btn btn-info">Add Location</a>
            </div>
        </div>
        @if ($locations->count() > 0)
            <table class="table text-center" id="locations">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Location</th>
                    <th>Division</th>
                    <th>Manager Mobile</th>
                    <th>Manager Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($locations as $key => $location)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $location->location }}</td>
                        <td>{{ $location->division }}</td>
                        <td>{{ $location->phone }}</td>
                        <td>{{ $location->email }}</td>
                        <td class="d-flex justify-content-center " style="gap: 10px">
                            <a href="{{route('admin.editlocation', ['id' => $location->id])}}" class="btn btn-info">Edit</a>
                            <div>
                                <form action="{{route("admin.deletelocation", ["id" => $location->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning" type="submit" value="Delete"
                                        onclick="return confirm('Are You Sure?')">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                    <h4 class="text-danger text-center">Nothing Found !</h4>
                    @endif
                </tbody>
            </table>
    </div>

@endsection
