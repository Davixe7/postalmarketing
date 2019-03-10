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
      $table->string('enterprise_id')->nullable();
      $table->string('serie')->nullable();
      $table->string('idd')->nullable();
      $table->string('name')->nullable();
      $table->string('postal_code')->nullable();
      $table->string('province')->nullable();
      $table->string('location')->nullable();
      $table->string('address')->nullable();
      $table->decimal('lat', 6, 4)->nullable();
      $table->decimal('lng', 6, 4)->nullable();
      $table->string('status')->nullable();
      $table->string('client_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('products');
  }
}
