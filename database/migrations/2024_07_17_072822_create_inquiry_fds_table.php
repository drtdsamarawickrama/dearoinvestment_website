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
        Schema::create('inquiry_fds', function (Blueprint $table) {
            $table->id();
            $table->enum('inquiry_step', ['CUSTOMER_PROFILE_ASSIGNED', 'BANK_DETAILS_ADDED','FD_DETAILS_ADDED','INQUIRY_SUBMITTED','DEARO1_INQUIRY_REVIEWED','DEARO2_INQUIRY_APPROVED']);
            $table->integer('amount')->nullable();
            $table->enum('period', ['1_MONTH', '3_MONTHS','6_MONTHS','1_YEAR','2_YEARS','3_YEARS','4_YEARS','5_YEARS'])->nullable();
            $table->decimal('preferred_rate', total: 5, places: 2)->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_fds');
    }
};
