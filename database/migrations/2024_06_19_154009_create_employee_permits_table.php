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
        Schema::create('employee_permits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_permit_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('longtime')->default(1);
            $table->timestamp('start_day');
            $table->timestamp('end_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_permits');
    }
};
