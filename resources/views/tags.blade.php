@extends('layouts.app')
@section('title', 'tags' )

@section('content')
<h2>tags</h2>
@foreach($tags as $tag)
    <li data-count="{{ $tag->stories()->count() }}"><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
@endforeach
@endsection