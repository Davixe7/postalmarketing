<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadetesTable extends Migration
{
  public function up(){
    Schema::create('cadetes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('cadete_id')->unique();
      $table->string('name');
      $table->string('lastname_1')->nullable();
      $table->string('lastname_2')->nullable();
      $table->string('gender')->default('M')->nullable();
      $table->string('email')->nullable();
      $table->boolean('status')->default(false);
      $table->timestamps();
    });
  }

  public function down(){
    Schema::dropIfExists('cadetes');
  }
}
