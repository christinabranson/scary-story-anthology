@extends('layouts.app')
@section('content')
    <ul class="storytags">
        @if ($story->username)
            <li class="main">Author:</li>
            <li>{{ $story->username }}</li>
        @endif
        @if ($story->getLink())
            <li class="main">Original Link:</li>
            <li><a href="{{ $story->getLink() }}" target="_blank" title="Read the original story"><i class="fa fa-external-link"></i></a></li>
        @endif
        <li class="main">Tags:</li>
        @foreach ($story->tags()->orderBy("name")->get() as $tag)
            <li><a href="{{ route('tag', $tag->id) }}" title="View other stores with the {{ $tag->name }} tag">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
    <div class="content singlestory">
        {!! $story->content !!}
    </div>
@endsection