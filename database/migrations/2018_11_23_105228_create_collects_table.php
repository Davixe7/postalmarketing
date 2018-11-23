<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectsTable extends Migration
{
  public function up()
  {
    Schema::create('collects', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->integer('workload_id');
      $table->integer('product_id');
      $table->bool('confirmed');
      $table->integer('status_id');
      $table->datetime('date');
    });
  }

  public function down()
  {
    Schema::dropIfExists('collects');
  }
}
