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
      $table->bigIncrements('id');
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('excerpt')->nullable();
      $table->string('meta_description')->nullable();
      $table->longText('content');
      $table->unsignedBigInteger('gallery_id')->nullable();
      $table->string('image')->nullable();
      $table->unsignedBigInteger('author');
      $table->timestamps();
      $table->foreign('author')->references('id')->on('users');
      $table->foreign('gallery_id')->references('id')->on('galleries');
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
