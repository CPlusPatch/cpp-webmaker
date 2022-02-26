<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

/* Route::prefix('cdn')->group(function () {
	
}); */
require __DIR__.'/auth.php';
