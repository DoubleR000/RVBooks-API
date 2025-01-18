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
        Schema::create('title_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("title_id");
            $table->unsignedBigInteger("genre_id");

            $table->foreign("title_id")
                ->references("id")
                ->on("titles");
            $table->foreign("genre_id")
                ->references("id")
                ->on("genres");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles_genres');
    }
};
