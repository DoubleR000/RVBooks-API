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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('condition_id');
            $table->dateTime('acquisition_date');
            $table->string('barcode');


            $table->foreign('status_id')
                ->references('id')
                ->on('book_statuses');
            $table->foreign('condition_id')
                ->references('id')
                ->on('book_conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
