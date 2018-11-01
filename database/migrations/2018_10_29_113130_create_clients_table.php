<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
  public function up()
  {
    Schema::create('clients', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->string('tel')->nullable();
      $table->string('address')->nullable();
      $table->string('x')->nullable();
      $table->string('y')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('clients');
  }
}
