<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationRequestTable extends Migration
{
  public function up()
  {
    Schema::create('confirmation_requests', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('collect_id');
      $table->unsignedInteger('confirmation_status_id')->default(0);
      $table->string('type');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('confirmation_request');
  }
}
