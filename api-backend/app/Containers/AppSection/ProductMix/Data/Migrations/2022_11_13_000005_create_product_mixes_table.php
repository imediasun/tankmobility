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
        Schema::create('product_mixes', function (Blueprint $table) {
            $table->id();
            $table->boolean('confidential_mix');
            $table->boolean('compatibility')->default(false); //Save here after compatibilities checking
            $table->boolean('exceptionaly');
            $table->json('products_list_ids');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_mixes');
    }
};
