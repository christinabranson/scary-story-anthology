<!DOCTYPE html>
<html>
<head>
    <title>Scary Stories About Camping</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="left" class="sidebar column">
    <div class="bottom bgimage">
        <div class="sidebar-content">
            <ul class="mainmenu">
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('tags') }}">Tags</a></li>
                <li><a href="{{ route('random') }}">Random</a></li>
                <li><a href="{{ route('latest') }}">Latest</a></li>
            </ul>
            <h1>
                Scary
                Stories
                <br/>
                <span class="smaller">About</span>
                <br/>
                <span class="larger">Camping</span>
            </h1>
            <h2 class="withline"><span>An Anthology</span></h2>
        </div>
    </div>
</div>
<div id="right" class="column column-with-padding">
    <div class="bottom">
        @yield('content')
    </div>
</div>
</body>
</html>