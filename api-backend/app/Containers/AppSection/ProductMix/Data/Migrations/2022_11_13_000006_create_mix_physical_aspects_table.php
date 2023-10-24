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
        Schema::create('mix_physical_aspects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_mix_id');
            $table->index('product_mix_id');
            $table->foreign('product_mix_id')->references('id')->on('product_mixes')->onDelete('cascade');
            $table->float('volume');
            $table->float('ph_rate');
            $table->float('water_quality');
            $table->string('conclusion');
            $table->string('comment');
            $table->boolean('agitation');
            $table->boolean('introduction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_physical_aspects');
    }
};
