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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_of_test');
            //$table->json('products_list_ids');
            $table->float('volume_in_liters');
            $table->string('segment');
            $table->string('observe_order');
            $table->bigInteger('validator')->nullable();
            $table->string('comment');
            $table->dateTime('rejected')->nullable();
            $table->dateTime('performed')->nullable();
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
