<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('police_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('citizen_id')->constrained('citizens')->cascadeOnDelete();
            $table->string('record_number')->unique();
            $table->string('case_number')->nullable();
            $table->string('record_type');
            $table->date('incident_date');
            $table->date('reported_date')->nullable();
            $table->string('police_station');
            $table->text('description')->nullable();
            $table->string('officer_name')->nullable();
            $table->enum('status', ['OPEN', 'UNDER_INVESTIGATION', 'CLOSED'])->default('OPEN');
            $table->text('outcome')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('police_records');
    }
};
