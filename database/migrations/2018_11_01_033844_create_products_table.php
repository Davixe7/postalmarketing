<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->increments('id');
      $table->string('ent_id')->nullable();
      $table->string('name')->nullable();
      $table->string('serie')->nullable();
      $table->string('state')->nullable();
      $table->string('location')->nullable();
      $table->string('address')->nullable();
      $table->string('cp')->nullable();
      $table->string('status')->nullable();
      $table->string('client_id')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('products');
  }
}
