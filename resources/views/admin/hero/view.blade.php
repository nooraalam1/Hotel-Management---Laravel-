@extends('admin.partials.app')
@section('title', 'View Hero Images')
@section('content')

<div class="page-content">
    <x-alerts />
    <div class="page-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h2 class="h3">Hero | View Hero Images</h2>
            <a href="{{ route('admin.hero.index') }}" class="btn btn-info">Add Hero</a>
        </div>

        <table class="table text-center">
            <tr>
                <th>SL</th>
                <th>Image</th>
            </tr>
            @foreach ($heros as $key=> $hero)
            <tr class="table-row">
                <td class="align-middle">{{ $heros->firstItem()+$key }}</td>
                <td class="">
                    <img src="{{ asset('storage/'.$hero->image )}}" width="200px" alt="hero_img">
                    <div class="d-flex justify-content-center align-items-center mt-2" style="gap:10px;">
                        <form action="{{ route('admin.heroDelete',['id'=>$hero->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are You Sure?')">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        
    </div>
</div>

@endsection
