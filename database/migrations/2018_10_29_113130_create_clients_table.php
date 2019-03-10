<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
  public function up()
  {
    Schema::create('clients', function (Blueprint $table) {
      $table->string('client_id');
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->string('email_2')->nullable();
      $table->string('postal_code')->nullable();
      $table->string('province')->nullable();
      $table->string('location')->nullable();
      $table->string('address')->nullable();
      $table->string('telephone')->nullable();
      $table->string('telephone_2')->nullable();
      $table->decimal('lat', 6, 4)->nullable();
      $table->decimal('lng', 6, 4)->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('clients');
  }
}
