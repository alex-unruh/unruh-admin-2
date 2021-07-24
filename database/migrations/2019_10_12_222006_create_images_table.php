<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('gallery_id');
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->string('link')->nullable();
			$table->string('path');
			$table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('images');
	}
}
