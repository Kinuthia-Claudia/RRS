<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('reservation_settings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('min_date')->nullable();
    $table->dateTime('max_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_settings');
    }
}
