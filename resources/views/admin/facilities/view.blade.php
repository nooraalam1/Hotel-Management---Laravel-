@extends('admin.partials.app')
@section('title', 'View Facility')
@section('content')

    <div class="page-content">
        <x-alerts />
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Facility | View Facilities</h2>
                <a href="{{ route('admin.addfacility') }}" class="btn btn-info">Add Facility</a>
            </div>
            @if ($facilities->count() > 0)
            <table class="table">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>

                    @foreach ($facilities as $key => $facility)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $facility->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $facility->image) }}" width="100px" alt="">
                            </td>

                            <td class="d-flex" style="gap: 10px">
                                <a href="#" class="btn btn-info">Edit</a>
                                <div>
                                    <form action="{{ route('admin.deleteFacility', ['id' => $facility->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-warning" type="submit" value="Delete">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h4 class="text-danger text-center">No Facility Found</h4>
                </table>
                @endif
        </div>
    </div>
@endsection
