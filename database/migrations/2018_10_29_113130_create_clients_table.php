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
      $table->string('client_id');
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->string('email_2')->nullable();
      $table->integer('cp')->nullable();
      $table->string('address')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('clients');
  }
}
