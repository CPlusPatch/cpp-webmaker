<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use EditorJS\EditorJS;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("posts.latest", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.editor.loading");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role == "admin") {
            $request->validate([
                "author" => "required"
            ]);

            // Fill request with default data
            $post = $request->all();
            $post["title"] = "Unnamed post";
            $post["content"] = '{"time":"1643650513791","blocks":[{"id":"Z2FHA2toiP","type":"header","data":{"text":"My new page","level":"2"}},{"id":"vC00K_O8NC","type":"paragraph","data":{"text":"Hello. This is your new page! Now, get ready to write anything you would like!<br>"}},{"id":"cxgUBcxliz","type":"header","data":{"text":"Key features of the editor","level":"3"}},{"id":"qX6Se8T0H4","type":"list","data":{"style":"unordered","items":["Block-styled editor<br>","<b>Fully <\/b><i>formattable <b>text<\/b><\/i><br>","Changes are auto saved as you I typed this<br>"]}}],"version":"2.22.2"}';
            $post["slug"] = rand(100000000, 999999999) . "-" . Str::slug($post["title"]); // Generate random slug
            $post["created_at"] = Carbon::now();
            $post["published"] = false;
            $post["uuid"] = Str::uuid()->toString();

            Post::create($post);

            return response($post["uuid"], 201);
        }

        return abort(401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug", $slug)->get()[0];
        if (!$post->published) {
            if (auth()->user()->role == "admin") {
                return view("posts.show", ["post" => $post]);
            }
        } else if (auth()->user()) {
            return view("posts.show", ["post" => $post]);
        }

        return abort(401);
    }

    /**
     * Display the specified post data in JSOn format
     *
     * @param  \App\Models\Post  $uuid
     * @return \Illuminate\Http\Response
     */
    public function showJSON($uuid)
    {
        if (auth()->user()->role == "admin") {
            try {
                $post = Post::where("uuid", $uuid)->get()[0];
            } catch (\Exception $e) {
                return response("No post was found", 404);
            }
            return response()->json([
                "title" => $post->title,
                "content" => $post->content
            ]);
        }
        return abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (auth()->user()->role == "admin") {
            return view("posts.editor.index", ["uuid" => $uuid]);
        }

        return abort(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (auth()->user()->role == "admin") {
            $request->validate([
                "title" => "required|max:255",
                "content" => "required|max:4096",
            ]);
            $uuid = $request->uuid;
            $post = Post::where("uuid", $uuid)->get()[0];
            if ($request->title != $post->title) {
                $post->title = $request->title;
                $post->slug = rand(100000000, 999999999) . "-" . Str::slug($request->title);
            }
            $post->content = $request->content;
            $post->update();
            return response(204);
        }

        return abort(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $uuid = $request->uuid;
        $post = Post::where("uuid", $uuid)->get()[0];
        $post->delete();
        return response("", 204);
    }
}
