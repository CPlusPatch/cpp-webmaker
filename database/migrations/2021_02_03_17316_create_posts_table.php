<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
            Schema::create("posts", function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string("title", 100);
                $table->string("content", 5000);
                $table->string("category", 30)->nullable();
                $table->string("slug", 200)->unique();
                $table->string("image", 500)->nullable();
                $table->timestamps();
                $table->boolean("published")->default(false);
                $table->dateTime("published_at")->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("posts");
    }
}
