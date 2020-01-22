<?php
namespace App\Http\Controllers;
use App\Story;
use App\Tag;
use Illuminate\Http\Request;

class Stories extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // no auth, custom verification
        //$this->middleware('auth');
    }

    public function index() {
        return redirect('about');
    }

    public function about() {
        return view('about');
    }

    public function tags() {
        $tags = Tag::query()->orderBy("name")->get();
        return view('tags', compact("tags"));
    }

    public function tag($id) {
        $tag = Tag::query()->where("id", "=", $id)->first();

        if (is_null($tag)) {
            return redirect('home');
        }

        $stories = $tag->stories;

        return view('tag', compact("tag", "stories"));
    }

    public function story($id) {
        $story = Story::query()->where("id", "=", $id)->first();

        if (is_null($story)) {
            return redirect('home');
        }

        return view('story', compact("story"));
    }
}