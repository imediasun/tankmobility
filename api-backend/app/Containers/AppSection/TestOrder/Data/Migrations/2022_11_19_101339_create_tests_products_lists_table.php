<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tests_products_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id');
            $table->index('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->bigInteger('products_list_id');
            $table->index('products_list_id');
            $table->foreign('products_list_id')->references('id')->on('products_lists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests_products_lists');
    }
};
