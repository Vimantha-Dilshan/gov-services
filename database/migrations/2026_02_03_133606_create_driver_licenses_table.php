<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('driver_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained('citizens');
            $table->string('license_number')->unique();
            $table->enum('license_type', ['LIGHT', 'HEAVY', 'MOTORCYCLE', 'COMMERCIAL']);
            $table->date('issued_date');
            $table->date('expiry_date');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'SUSPENDED'])->default('ACTIVE');
            $table->string('issuing_authority')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driver_licenses');
    }
};
