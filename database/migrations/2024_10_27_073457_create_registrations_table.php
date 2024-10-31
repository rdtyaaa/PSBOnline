<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->text('current_address');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('province_id')->constrained('provinces');
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('place_of_birth_city')->constrained('cities');;
            $table->foreignId('place_of_birth_province_id')->constrained('provinces');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('marital_status', ['Single', 'Married']);
            $table->foreignId('religion_id')->constrained('religions');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
