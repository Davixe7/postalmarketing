<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkloadsTable extends Migration
{
  public function up()
  {
    Schema::create('workloads', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('cadete_id');
      $table->datetime('date');
      $table->integer('status_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('workloads');
  }
}
