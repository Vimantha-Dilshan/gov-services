<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('nic')->unique()->index();
            $table->string('initials')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('initial_name')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER'])->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('blood_type', [
                'A+',
                'A-',
                'B+',
                'B-',
                'AB+',
                'AB-',
                'O+',
                'O-'
            ])->nullable();
            $table->string('occupation')->nullable();
            $table->string('city')->nullable();
            $table->text('permanent_address')->nullable();
            $table->date('death_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
