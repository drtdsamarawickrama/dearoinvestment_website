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
        Schema::create('billing_proofs', function (Blueprint $table) {
            $table->id();
            $table->enum('owner_type', ['CUSTOMER', 'GUARANTOR'])->default('CUSTOMER');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('guarantor_id')->nullable();
            $table->enum('proof_type', ['WATER_BILL', 'ELECTRICITY_BILL','OTHER_BILL'])->default('OTHER_BILL');
            $table->string('title')->nullable();
            $table->string('document_file');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_proofs');
    }
};
