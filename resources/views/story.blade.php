@extends('layouts.app')
@section('title', 'a story...')

@section('content')
<div class="contant">
    {!! $story->content !!}
</div>
<ul>
    @foreach ($story->tags as $tag)
        <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
    @endforeach
</ul>
@endsection