@extends('layouts.app')
@section('content')
    <ul id="wordcount" class="wordcount">
        @foreach($tags as $tag)
            <li class="word" data-count="{{ $tag->stories()->count() }}"><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // A $( document ).ready() block.
        $(document).ready(function() {
            console.log("ready!");
            stylizeWords();
        });


        function stylizeWords() {
            var maxSize = 5;
            var minSize = 1;
            var wordsInListing = $("#wordcount").find("li.word");
            var maxWordCount = 0;

            // first get the max word count
            wordsInListing.each(function() {
                var count = $(this).data("count");
                if (count > maxWordCount) {
                    maxWordCount = count;
                }
            });

            wordsInListing.each(function() {
                var count = $(this).data("count");
                var ratioForStyle = round(maxSize * count / maxWordCount, 2);
                console.log(count);
                console.log(ratioForStyle);
                $(this).css("font-size", ratioForStyle + "em");
            });
        }

        function randomIntFromInterval(min, max) {
            // min and max included
            return Math.floor(Math.random() * (max - min + 1) + min);
        }

        function round(value, decimals) {
            if (value < 1) {
                return 1;
            }
            return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
        }


    </script>
@endsection