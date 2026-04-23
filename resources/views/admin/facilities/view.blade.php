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
        <table id="facility" class="table text-center">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facilities as $key => $facility)
                <tr>
                    <td class="align-middle">{{ $key + 1 }}</td>
                    <td class="align-middle">{{ $facility->name }}</td>
                    <td class="align-middle">
                        <img src="{{ asset('storage/' . $facility->image) }}" style="background-color: white"
                            width="70px" height="auto" alt="{{ $facility->name }}">
                    </td>
                    <td class="">
                        <a href="{{ route('admin.editFacility', ['id' => $facility->id]) }}"
                            class="btn btn-info col mb-2">Edit</a>
                        <div>
                            <form action="{{ route('admin.deleteFacility', ['id' => $facility->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-warning col" type="submit" value="Delete">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <h4 class="text-danger text-center">No Facility Found</h4>
                @endif
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
            new DataTable('#facility');
        })
</script>
@endsection
