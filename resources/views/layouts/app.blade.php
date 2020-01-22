<!DOCTYPE html>
<html>
<head>
    <title>SSAC - @yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>
<div id="left" class="sidebar column">
    <div class="top-left"></div>
    <div class="bottom bgimage">
        <div class="sidebar-content">
            <h1>Scary Stories About Camping</h1>
            <h2>An Anthology</h2>
            <ul class="mainmenu">
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('tags') }}">Tags</a></li>
                <li><a href="{{ route('random') }}">Random</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="right" class="column column-with-padding">
    <div class="top-right"></div>
    <div class="bottom">
        @yield('content')
    </div>
</div>
</body>
</html>