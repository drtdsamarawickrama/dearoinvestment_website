<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inquiry_leases', function (Blueprint $table) {
            $table->id();
            $table->enum('inquiry_step', ['CUSTOMER_PROFILE_ASSIGNED', 'BANK_DETAILS_ADDED','VEHICLE_DETAILS_ADDED','GUARANTOR_ADDED','GUARANTOR2_ADDED','INQUIRY_SUBMITTED','DEARO1_INITIAL_APPROVAL','DEARO2_CUSTOMER_VISIT','DEARO3_SUBMIT_FOR_APPROVAL','DEARO4_APPLIED_FOR_MANAGER_APPROVAL','DERO5_PAYMENT_RELEASED']);
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->unsignedBigInteger('guarantor_id')->nullable();
            $table->unsignedBigInteger('guarantor2_id')->nullable();
            $table->boolean('is_arrears')->default(false);
            $table->boolean('vehicle_missing')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_leases');
    }
};
