<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hospital_id');
            $table->longText('comfort');
            $table->longText('money');
            $table->longText('food');
            $table->longText('transport');
            $table->longText('treatment');
            $table->longText('language');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_facilities');
    }
}
