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
            $post["content"] = "Blank content";
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
    public function show(Post $post)
    {
        //
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
            $post = Post::where("uuid", $uuid)->get()[0];
            return response()->json($post->content);
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
            /* try {
                // Initialize Editor backend and validate structure
                $editor = new EditorJS($request->content, );
                // Get sanitized blocks (according to the rules from configuration)
                $blocks = $editor->getBlocks();
                
            } catch (\Exception $e) {
                return response($e, 500);
            } */
            $uuid = $request->uuid;
            $post = Post::where("uuid", $uuid)->get()[0];
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
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect("/dashboard");
    }
}
