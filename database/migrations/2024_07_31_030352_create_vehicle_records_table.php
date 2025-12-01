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
        Schema::create('vehicle_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->boolean('is_registered')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('engine_capacity')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('registered_year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('manufactured_year')->nullable();
            $table->integer('meter_reading')->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->string('pic_registration_certificate')->nullable();
            $table->string('pic_lessee_and_vehicle')->nullable();
            $table->string('pic_vehicle_front')->nullable();
            $table->string('pic_vehicle_rear')->nullable();
            $table->string('pic_vehicle_left')->nullable();
            $table->string('pic_vehicle_right')->nullable();
            $table->string('pic_meter_reading')->nullable();
            $table->string('pic_engine_number')->nullable();
            $table->string('pic_chassis_number')->nullable();
            $table->decimal('insurance_valuation', 10, 2)->nullable();
            $table->decimal('lease_valuation', 10, 2)->nullable();
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
        Schema::dropIfExists('vehicle_records');
    }
};
