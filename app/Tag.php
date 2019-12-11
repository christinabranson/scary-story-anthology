<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = [
        "name",
    ];


    public function stories() {
        return $this->hasManyThrough("App\Story", "stories_to_tags", "tag_id", "story_id", "id");
    }
}
