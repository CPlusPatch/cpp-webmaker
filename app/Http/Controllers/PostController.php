<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use EditorJS\EditorJS;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

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
		if (auth()->user() && auth()->user()->role == "admin") {
			return view("posts.editor.loading");
		}

		return abort(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user() && auth()->user()->role == "admin") {
            $request->validate([
                "author" => "required"
            ]);

            // Fill request with default data
            $post = $request->all();
            $post["content"] = '{"time":"1645884737743","blocks":[{"id":"Z2FHA2toiP","type":"header","data":{"text":"No name","level":"2"}},{"id":"vC00K_O8NC","type":"paragraph","data":{"text":"Hello, this is your new page! Now, get ready to write anything you like!<br>"}},{"id":"cxgUBcxliz","type":"header","data":{"text":"Key features of the editor","level":"3"}},{"id":"qX6Se8T0H4","type":"list","data":{"style":"unordered","items":["Block-styled<br>","<b>Fully <\/b><mark class=\"cdx-marker\"><b><\/b><i>formattable <b><\/b><\/i><\/mark><i><b>text<\/b><\/i><br>","Changes are auto saved as you type<br>"]}}],"version":"2.23.2"}';
            $post["slug"] = rand(100000000, 999999999) . "-" . Str::slug("New post"); // Generate random slug
            $post["created_at"] = Carbon::now();
            $post["uuid"] = Str::uuid()->toString();
			$post["prefs"] = json_encode([
				"visibility" => "private",
				"banner" => "",
				"title" => "New post",
				"locked" => false,
			]);
			//return json_encode($post["prefs"]);

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
		$prefs = json_decode($post->prefs);
        if ($prefs->visibility == "public" || ($prefs->visibility == "restricted" && auth()->user()) || (auth()->user() && auth()->user()->role == "admin")) {
            return view("posts.show", ["post" => $post]);
        } else {
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
        if (auth()->user() && auth()->user()->role == "admin") {
            try {
                $post = Post::where("uuid", $uuid)->get()[0];
				$prefs = json_decode($post->prefs);
            } catch (\Exception $e) {
                return response("No post was found", 404);
            }
            return response()->json([
                "title" => $prefs->title,
                "content" => $post->content,
				"visibility" => $prefs->visibility,
				"banner" => $prefs->banner,
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
        if (auth()->user() && auth()->user()->role == "admin") {
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
        if (auth()->user() && auth()->user()->role == "admin") {
            $request->validate([
                "title" => "required|max:255",
                "content" => "required|max:4096",
				"visibility" => ["string", ValidationRule::in(["public", "restricted", "private"])],
				"banner" => "url|max:255",
            ]);
            $uuid = $request->uuid;
            $post = Post::where("uuid", $uuid)->get()[0];
			$prefs = json_decode($post->prefs);
            if ($request->title != $post->title) {
                $prefs->title = $request->title;
                $post->slug = rand(100000000, 999999999) . "-" . Str::slug($request->title);
            }
			if (isset($request->visibility)) {
				$prefs->visibility = $request->visibility;
			}
            $post->content = $request->content;
			$post->prefs = json_encode($prefs);
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
		if (auth()->user() && auth()->user()->role == "admin") {
			$uuid = $request->uuid;
			$post = Post::where("uuid", $uuid)->get()[0];
			$post->delete();
			return response("", 204);
		}

		return abort(401);
    }
}
