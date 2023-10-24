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
        Schema::create('products_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->index('product_id');
            $table->string('code_basf');//BAS 750 01 F
            $table->string('unit');
            $table->string('comment')->nullable();
            $table->float('dose');
            $table->integer('quantity');
            $table->string('entity')->default('DEFAULT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_lists');
    }
};
