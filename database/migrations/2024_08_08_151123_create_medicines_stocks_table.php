<?php

use App\Models\MedicinesModel;
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
        Schema::create('medicines_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MedicinesModel::class)->nullable();
            $table->text('batch_id')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('quantity')->default(0);
            $table->text('mrp')->nullable();
            $table->text('rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines_stocks');
    }
};
