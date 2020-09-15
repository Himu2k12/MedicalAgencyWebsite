<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('brand_id');
            $table->string('hospital_name');
            $table->string('established_in');
            $table->integer('number_of_beds');
            $table->string('speciality')->nullable();
            $table->longText('about');
            $table->longText('specialist');
            $table->longText('infrastructure')->nullable();
            $table->text('address');
            $table->longText('location');
            $table->string('slug');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('hospitals');
    }
}
