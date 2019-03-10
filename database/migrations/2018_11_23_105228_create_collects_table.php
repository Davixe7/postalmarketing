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
      $table->integer('workload_id');
      $table->string('product_id');
      $table->datetime('date');
      $table->boolean('confirmed')->default(0);
      $table->integer('status_id')->default(0);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('collects');
  }
}
