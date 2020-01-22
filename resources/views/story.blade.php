<!DOCTYPE html>
<html>
<body>
<h1>story</h1>
<div class="contant">
    {!! $story->content !!}
</div>
<ul>
    @foreach ($story->tags as $tag)
        <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
    @endforeach
</ul>
</body>
</html>