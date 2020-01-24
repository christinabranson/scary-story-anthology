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
        "page_link",
        "link",
    ];


    public function generateSummary($chars = 200) {
        $strippedContent = strip_tags($this->content);
        if (strlen($strippedContent) <= $chars) {
            return $strippedContent;
        }

        return substr($strippedContent, 0, $chars) . "...";
    }

    public function generateContentAsHTML() {
        return htmlspecialchars_decode($this->content);
    }

    public function getParentLink() {
        if (strlen($this->page_link)) {
            if (strpos($this->page_link, "http") !== false) {
                return $this->page_link;
            } else {
                return "http://reddit.com/" . $this->page_link;
            }
        }

        return null;
    }

    public function getLink() {
        if (strlen($this->link)) {
            if (strpos($this->link, "http") !== false) {
                return $this->link;
            } else {
                return "http://reddit.com/" . $this->link;
            }
        }

        return null;
    }

    public function tags() {
        return $this->belongsToMany("App\Tag", "stories_to_tags", "story_id", "tag_id");
    }
}
