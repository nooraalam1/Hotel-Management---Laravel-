@extends('admin.partials.app')
@section('title', 'Add Room')
@section('content')

    <div class="page-content">
        <x-alerts/>
        <div class="page-header">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h2 class="h5 no-margin-bottom">Blog | View Blog</h2>
                <a href="{{ route('admin.addblog') }}" class="btn btn-info">Add Blog</a>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Tagline</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @forelse ($blogs as $blog)
                    <tr class="table_row">
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->tagline }}</td>
                        <td>{{ $blog->description }}</td>
                        <td>
                            <img src="{{asset('storage/'.$blog->image)}}" width="50"/>
                        </td>
                        <td class="d-flex" style="gap: 10px">
                           <a href="{{route('admin.edit',['room'=>$blog])}}" class="btn btn-info">Edit</a>
                            <div>
                                <form action="{{route('admin.delete_room',['room'=>$blog])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-warning" type="submit" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h4 class="d-flex justify-content-center">No Data Found</h4>
                @endforelse
            </table>
        </section>
    </div>
@endsection
