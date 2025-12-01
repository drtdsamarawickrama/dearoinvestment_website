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
        Schema::create('bank_statements', function (Blueprint $table) {
            $table->id();
            $table->enum('owner_type', ['CUSTOMER', 'GUARANTOR'])->default('CUSTOMER');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('guarantor_id')->nullable();
            $table->date('statement_start_date');
            $table->date('statement_end_date');
            $table->string('statement_file');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_statements');
    }
};
