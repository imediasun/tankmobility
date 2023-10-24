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
        Schema::create('mix_global_conclusion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_mix_id');
            $table->index('product_mix_id');
            $table->foreign('product_mix_id')->references('id')->on('product_mixes')->onDelete('cascade');
            $table->string('global_conclusion');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mix_global_conclusion');
    }
};
