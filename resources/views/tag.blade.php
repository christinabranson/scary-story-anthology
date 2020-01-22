<h1>tag: {{ $tag->name }}</h1>
<ul>
    @foreach($stories as $story)
    <li data-count="{{ $story->id }}"><a href="{{ route('story', $story->id) }}">{{ $story->generateSummary() }}</a><br/>
    Other tags:
        <ul id="wordcount">
    @foreach ($story->tags as $tag)
                <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
    @endforeach
        </ul>
    </li>
@endforeach
</ul>