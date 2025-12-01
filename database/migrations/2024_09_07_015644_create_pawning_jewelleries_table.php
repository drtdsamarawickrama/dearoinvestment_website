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
        Schema::create('pawning_jewelleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pawning_inquiry_id');
            $table->string('description');
            $table->integer('jewellery_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pawning_jewelleries');
    }
};
