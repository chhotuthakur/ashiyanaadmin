<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('residential');
            $table->string('property_type');
            $table->string('apartment_type');
            $table->string('bhk_type');
            $table->string('ownership');
            $table->decimal('plot_area', 8, 2);
            $table->decimal('built_up_area', 8, 2);
            $table->string('facing')->nullable();
            $table->integer('total_floor');
            $table->decimal('price', 10, 2);
            $table->string('furniture_type');
            $table->boolean('parking');
            $table->integer('bathroom');
            $table->integer('balcony');
            $table->string('who_will_use');
            $table->boolean('gated_security');
            $table->boolean('water_supply');
            $table->boolean('power_backup');
            $table->json('amenities');
            $table->string('locality');
            $table->string('landmark');
            $table->string('certified_approval');
            $table->string('taxes');
            $table->string('availability');
            $table->string('time_schedule');
            $table->json('photos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
