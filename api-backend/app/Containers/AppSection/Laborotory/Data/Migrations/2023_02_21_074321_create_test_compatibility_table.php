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
        Schema::create('test_compatibility', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('test_id');
            $table->index('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->boolean('compatibility_conclusion');
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_compatibility');
    }
};
