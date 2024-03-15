<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employeeId');
            $table->string('name',50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone',20)->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('identification',20)->nullable();
            $table->unsignedInteger('departmentId');
            $table->unsignedInteger('positionId');
            $table->unsignedInteger('levelId');
            $table->unsignedInteger('specializedId');
            $table->unsignedInteger('salaryId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
