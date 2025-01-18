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
        Schema::create('title_author', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("title_id");
            $table->unsignedBigInteger("author_id");

            $table->foreign("title_id")
                ->references("id")
                ->on("titles");
            $table->foreign("author_id")
                ->references("id")
                ->on("authors");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles_authors');
    }
};
