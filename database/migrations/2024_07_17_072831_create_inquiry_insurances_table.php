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
        Schema::create('inquiry_insurances', function (Blueprint $table) {
            $table->id();
            $table->enum('inquiry_step', ['CUSTOMER_PROFILE_ASSIGNED', 'BANK_DETAILS_ADDED','VEHICLE_DETAILS_ADDED','INSURANCE_DETAILS_ADDED','INQUIRY_SUBMITTED','DEARO1_INQUIRY_REVIEWED','DEARO2_INQUIRY_APPROVED']);
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_insurances');
    }
};
