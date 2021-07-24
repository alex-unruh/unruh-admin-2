<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('categories', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->unsignedBigInteger('parent')->nullable();
      $table->string('description')->nullable();
      $table->string('image')->nullable();
      $table->timestamps();
      $table->foreign('parent')->references('id')->on('categories');
    });

    $this->insertFirstRecord();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('categories');
  }

  /**
   * Undocumented function
   *
   * @return void
   */
  private function insertFirstRecord()
  {
    $category = new Category();
    $category->name = 'Nenhuma';
    $category->description = 'Categoria primária do sistema';
    $category->save();
  }
}
