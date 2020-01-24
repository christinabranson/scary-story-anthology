@extends('layouts.app')
@section('content')
    <div class="content">
        <h2>About</h2>
        <h3>The Idea</h3>
        <p class="sans-serif-text">It is extremely important to note that <strong>none</strong> of these stories are mine.
            I'm attributing the real authors in each place, and providing a link to the original source. Image credit goes to <a href="https://www.instagram.com/bladvagacian/" target="_blank">Vlad Băgăcian</a>!
        </p>
        <p>
            Like most kids, I loved ghost stories as a kid. Anything creepy, or weird, or haunted, or supernatural. I just couldn't get enough of it. As a child, I spent half my nights
            awake because some idea or another scared me too much to let me fall asleep.
        </p>
        <p>
            Now in my thirties, I still haven't grown out of it. But, the internet has made it significantly easier to find new material to keep myself up at night. This website
            serves a place to keep my favorites saved.
        </p>
        <h3>About Me</h3>
        <p>
            My name is Christina, and I'm a back end web developer based in Philadelphia, PA. I'm always on the lookout for new side projects & new scary stories.
        </p>
        <ul class="storytags">
            <li class="main">Me</li>
            <li><a href="https://christinab.dev" title="To My Personal Site">View My Personal Site <i class="fa fa-external-link"></i></a></li>
        </ul>
        <h3>The Website & Browser Extension</h3>
        <p>
            The website was developed using PHP & the Laravel framework. In order to populate the site with content, I've created a Browser Extension for Chrome that will easily let me pull
            (scrape) stories from Reddit.
        </p>
        <ul class="storytags">
            <li class="main">More Info:</li>
            <li><a href="https://christinab.dev/portfolio" target="_blank" title="View the write up">Write Up <i class="fa fa-external-link"></i></a></li>
            <li><a href="https://github.com/christinabranson/scary-story-anthology" target="_blank" title="View website code on GitHub">Website On Github <i class="fa fa-external-link"></i></a></li>
            <li><a href="https://github.com/christinabranson/reddit-scrape-chrome-extension" target="_blank" title="View browser extension code on GitHub">Browser Extension On Github <i class="fa fa-external-link"></i></a></li>
        </ul>
    </div>
@endsection