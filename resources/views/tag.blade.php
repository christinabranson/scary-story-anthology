@extends('layouts.app')
@section('content')
    <h2>{{$tag->name }}</h2>
    <div class="story_listing">
        @foreach($stories as $story)
            <div class="content">
                <ul class="storytags">
                    <li class="main">Link:</li>
                    <li><a href="{{ route('story', $story->id) }}" title="Read the story here"><i class="fa fa-link"></i></a></li>
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
                <p>{{ $story->generateSummary(300) }}</p>
            </div>
        @endforeach
    </div>
@endsection