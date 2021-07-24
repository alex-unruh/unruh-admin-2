<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->smallInteger('purpose');
            $table->tinyInteger('type');
            $table->string('uf', 2);
            $table->string('city');
            $table->string('district');
            $table->string('address');
            $table->string('number', 6);
            $table->bigInteger('value')->nullable();
            $table->boolean('value_m2')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('meta_description')->nullable();            
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('properties');
    }
}
