<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->unique()->constrained('citizens')->cascadeOnDelete();
            $table->string('passport_number')->unique();
            $table->enum('passport_type', ['ORDINARY', 'DIPLOMATIC', 'OFFICIAL'])->default('ORDINARY');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->enum('sex', ['MALE', 'FEMALE', 'OTHER']);
            $table->date('issued_date');
            $table->date('expiry_date');
            $table->string('issuing_authority')->nullable();
            $table->enum('status', ['ACTIVE', 'EXPIRED', 'CANCELLED'])->default('ACTIVE');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('passports');
    }
};
