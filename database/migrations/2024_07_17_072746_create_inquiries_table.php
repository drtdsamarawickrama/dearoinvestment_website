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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id()->from(10110);
            $table->unsignedBigInteger('customer_id');
            $table->enum('inquiry_type', ['LEASE', 'FD','INSURANCE','PAWNING']);
            $table->enum('inquiry_status', ['DRAFT', 'PENDING_RESPONSE','BRANCH_RESPONDED','CUSTOMER_ACTION_PENDING']);
            $table->unsignedBigInteger('reference_inquiry_id')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
