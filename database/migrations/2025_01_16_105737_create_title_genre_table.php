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
            $table->foreignIdFor(\App\Models\Title::class)->constrained();
            $table->foreignIdFor(\App\Models\Genre::class)->constrained();
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
