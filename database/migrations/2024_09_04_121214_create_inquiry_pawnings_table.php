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
        Schema::create('inquiry_pawnings', function (Blueprint $table) {
            $table->id();
            $table->enum('inquiry_step', ['CUSTOMER_PROFILE_ASSIGNED', 'BANK_DETAILS_ADDED','PAWN_DETAILS_ADDED','INQUIRY_SUBMITTED','DEARO1_INQUIRY_REVIEWED','DEARO2_INQUIRY_APPROVED']);
            $table->boolean('pawned_elsewhere')->default(false);
            $table->string('pic_pawned_receipt_elsewhere')->nullable();
            $table->boolean('is_jewellery_added')->default(false);
            $table->decimal('amount', 12,2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_pawnings');
    }
};
