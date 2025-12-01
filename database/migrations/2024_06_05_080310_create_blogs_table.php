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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500);
            $table->string('sub_title', 500)->nullable();
            $table->text('meta_description');
            $table->string('og_image', 200);
            $table->string('slug', 200);
            $table->enum('article_type', ['ANNUAL_REPORT', 'QUARTERLY_REPORT', 'GENERAL_ARTICLE'])->default('GENERAL_ARTICLE');
            $table->enum('status', ['DRAFT', 'COMPLETED', 'PUBLISHED'])->default('DRAFT');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
