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
        Schema::create('test_compatibility_mousse', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id');
            $table->index('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->boolean('immediately');
            $table->boolean('2h');
            $table->boolean('6h');
            $table->boolean('24h');
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_compatibility_mousse');
    }
};
