<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = "stories";

    protected $fillable = [
        "title",
        "username",
        "content",
        "parent_link",
        "link",
    ];


    public function tags() {
        return $this->belongsToMany("App\Tag", "stories_to_tags", "story_id", "tag_id", "id");
    }
}
