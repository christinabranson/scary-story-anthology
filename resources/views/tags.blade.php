<h1>tags</h1>
@foreach($tags as $tag)
    <li data-count="{{ $tag->stories()->count() }}"><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
@endforeach