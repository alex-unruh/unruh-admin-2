<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('email')->unique();
      $table->string('password');
      $table->rememberToken();
      $table->smallInteger('profile');
      $table->boolean('status');
      $table->string('photo')->nullable();
      $table->timestamps();
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
    Schema::dropIfExists('users');
  }

  /**
   * Inserts a first user in table
   *
   * @return void
   */
  private function insertFirstRecord()
  {
    $user = new User();
    $user->name     = 'Admin';
    $user->email    = 'usuario@admin.com';
    $user->password = 'admin01';
    $user->profile  = 'Administrador';
    $user->status   = 'Ativo';
    $user->save();
  }
  
}
