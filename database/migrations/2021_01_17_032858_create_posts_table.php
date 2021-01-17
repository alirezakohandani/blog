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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('title');
            $table->text('body');
            $table->string('thumb')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->enum('post_type', ['article', 'podcast', 'video']);
            $table->string('file');
            $table->boolean('is_vip')->default(false);
            $table->enum('status', ['published', 'draft', 'no-signed'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
