<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id(); // This creates an unsigned big integer primary key
            $table->string('name');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade'); // Ensure this references the correct table
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade'); // Ensure this references the correct table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('districts');
    }
};
