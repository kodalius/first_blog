@extends('layouts.main')
@section('content')
    <div class="container">

        <ul>
            @foreach($categories as $category)
            <li><a href="{{route('category.post.index',$category->id)}}">{{$category->title}}
                    ({{$category->posts()->count()}})</a></li>

            @endforeach


        </ul>
    </div>

@endsection
