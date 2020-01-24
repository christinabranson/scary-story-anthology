<?php
namespace App\Http\Controllers;
use App\Story;
use App\Tag;
use Illuminate\Http\Request;

class API extends Controller
{

    const API_USER_NAME = "api_user";
    const API_USER_PASSWORD = "cPsSEfwfsHBJErv4AM8qhwptBmePkd78pQsKdGNXNWE5qyznHuUhxNEzaZM9VmxGASynkU3dXy8f";

    private $requestData;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // no auth, custom verification
        //$this->middleware('auth');
    }

    public function postStory(Request $request)
    {

        $this->requestData = json_decode($request->getContent(), true);

        if (!$this->verifyAuth()) {
            return response()->json([
                "success" => false,
                "error" => "You are not authorized to access this API.",
            ], 401);
        }

        if (!$this->verifyRequiredFields()) {
            return response()->json([
                "success" => false,
                "error" => "Please make sure all fields are entered.",
            ], 400);
        }

        // Get the payment details W/O auth information
        $postData = $this->requestData["data"];
        $tagData = isset($postData["tags"]) ? $postData["tags"] : array();
        unset($postData["auth"]);
        unset($postData["tags"]);
        $postData["username"] = $postData["author"];

        $story = new Story($postData);
        $story->save();

        // get the payment request ID
        $story_id = $story->id;

        if (!empty($tagData)) {
            $tagSync = array();
            $tagDataArray = explode(", ", $tagData);
            foreach ($tagDataArray as $tagDataItem) {
                $tag = Tag::firstOrCreate(["name" => $tagDataItem]);
                if ($tag->exists) {
                    $tagSync[] = $tag->id;
                }
            }
            $story->tags()->sync($tagSync);
        }

        $message = "Request saved with ID `$story_id`.";

        return response()->json([
            "success" => true,
            "message" => $message,
        ], 200);

    }

    public function sampleDocumentation() {

        $jsonArray = array();
        $jsonArray["auth"] = array();
        $jsonArray["auth"]["user"] = self::API_USER_NAME;
        $jsonArray["auth"]["password"] = self::API_USER_PASSWORD;
        $jsonArray["parent_link"] = "https://google.com";
        $jsonArray["link"] = "https://google.com/link/to/direct/path";
        $jsonArray["username"] = "testuser";
        $jsonArray["content"] = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pretium erat commodo, efficitur nunc ut, bibendum purus. Sed diam felis, tempor at luctus in, imperdiet ut diam. In vitae congue lorem. Aliquam iaculis eget dui eu euismod. Praesent venenatis, nibh ac sodales volutpat, nibh dolor sollicitudin nisi, vitae tempus nunc enim vel erat. Fusce non fringilla est. Nam ullamcorper enim eget rutrum sollicitudin. Mauris mattis nunc a laoreet sollicitudin. Phasellus pulvinar ipsum in tellus sagittis, et luctus metus aliquam.</p><p> Aliquam erat volutpat. Cras ultrices, nisi quis laoreet aliquam, massa sem fringilla mi, at ullamcorper arcu ex eget ipsum. Quisque et nibh nunc. Nullam in ultrices dolor, non malesuada mi.</p>";
        $jsonArray["tags"] = "test tag 1, test tag 2, test tag 3";
        return response()->json($jsonArray);
    }

    private function verifyAuth() {
        if (!isset($this->requestData["auth"])) {
            return false;
        }

        if (!isset($this->requestData["auth"]["user"])) {
            return false;
        }

        if (!isset($this->requestData["auth"]["password"])) {
            return false;
        }

        if ($this->requestData["auth"]["user"] != self::API_USER_NAME) {
            return false;
        }

        if ($this->requestData["auth"]["password"] != self::API_USER_PASSWORD) {
            return false;
        }

        return true;
    }

    private function verifyRequiredFields() {

        foreach ([
                     "content",
                     "page_link",
                     //"link",
                 ] as $requiredField) {

            if (!isset($this->requestData["data"][$requiredField])) {
                return false;
            }
        }

        return true;
    }

}