<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    /**
     * Upload an image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function file(Request $request) {
        $validated = $request->validate([
            "image" => "required|image|mimes:jpg,png,jpeg,gif,svg|max:4096",
        ]);

        $image = $validated["image"];
        
        $name = Str::uuid() . "." . $image->getClientOriginalExtension();
        $destination = public_path("cdn/uploads");
        $path = $image->move($destination, $name);
        
        // Save image to database
        $url = "/cdn/uploads/" . $name;

        // Return response to EditorJS
        return ["success" => 1, "file" => ["url" => $url]];
    }

    /**
     * Upload an image from a URL
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function url(Request $request) {
        $validated = $request->validate([
            "url" => "required|url",
        ]);

        $url = $validated["url"];

        try {
			$extension = explode(".", $url)[array_key_last(explode(".", $url))];
			$name = Str::uuid() . "." . $extension;

			$destination = public_path("cdn/uploads/") . $name;
			$path = file_put_contents($destination, file_get_contents($url));
			return ["success" => 1, "file" => ["url" => "/cdn/uploads/" . $name]];
		} catch (\Exception $e) {
			return ["success" => 0, "error" => config("app.debug") == true ? "$e" : ""];
		}
    }
}
