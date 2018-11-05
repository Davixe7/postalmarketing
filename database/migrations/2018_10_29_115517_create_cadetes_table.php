<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadetesTable extends Migration
{
  public function up(){
    Schema::create('cadetes', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->integer('cadete_id')->unique();
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->boolean('status');
    });
  }

  public function down(){
    Schema::dropIfExists('cadetes');
  }
}
