<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained();
            $table->string('make');
            $table->string('model');
            $table->string('registration_number')->unique();
            $table->year('year_of_manufacture');
            $table->enum('type', ['CAR', 'MOTORCYCLE', 'TRUCK', 'VAN', 'BUS', 'SUV', 'MINIVAN']);
            $table->string('color');
            $table->string('color_code', 7)->nullable();
            $table->integer('seat_capacity');
            $table->string('fuel_type');
            $table->string('last_registration')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
