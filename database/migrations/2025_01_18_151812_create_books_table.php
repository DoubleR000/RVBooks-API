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
            $table->foreignIdFor(App\Models\Title::class)->constrained();
            $table->foreignIdFor(App\Models\Location::class)->constrained();
            $table->foreignIdFor(App\Models\BookStatus::class)->constrained();
            $table->foreignIdFor(App\Models\BookCondition::class)->constrained();
            $table->dateTime('acquisition_date');

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
