<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 15);
            $table->string('lat', 10)->nullable()->default('');
            $table->string('lon', 10)->nullable()->default('');
            $table->string('country', 50)->nullable()->default('');
            $table->string('region', 50)->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('isp')->nullable()->default('');
            $table->string('browser')->nullable()->default('');
            $table->string('version', 5)->nullable()->default('');
            $table->string('device')->nullable()->default('');
            $table->string('platform')->nullable()->default('');
            $table->string('uri')->nullable()->default('');
            $table->string('referer')->nullable()->default('');
            $table->smallInteger('year');
            $table->smallInteger('month');
            $table->smallInteger('day');
            $table->smallInteger('hour');
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
        Schema::dropIfExists('statistics');
    }
}
