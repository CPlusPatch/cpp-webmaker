<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UserBannerController;
use Sopamo\LaravelFilepond\Http\Controllers\FilepondController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource("/posts", PostController::class);

Route::controller(PostController::class)->group(function () {
    Route::get("posts/{slug}", "show");
	// Add some new routes to edit posts by UUID
	Route::get("post/{uuid}/edit", "edit");
	Route::get("post/{uuid}", "showJSON");
	Route::patch("post/{uuid}", "update");
	Route::post("post/{uuid}/publish", "publish");
	Route::delete("post/{uuid}", "destroy");
});

Route::controller(FileUploadController::class)->group(function() {
	Route::post("/cdn/upload", "file");
	Route::post("/cdn/url", "url");
});

Route::post('/cdn/fp-upload', [FilepondController::class, 'upload'])->name('filepond.upload');
Route::post("/account/banner", [UserBannerController::class, "update"]);
/* Route::prefix('cdn')->group(function () {
	
}); */
require __DIR__.'/auth.php';
