<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->timestamp('start_day')->nullable();
            $table->timestamp('end_day')->nullable();
            $table->unsignedBigInteger('apporved_by')->nullable();
            $table->enum('approve_status', [0,1])->default(0);
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
