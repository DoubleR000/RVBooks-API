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
        Schema::create('loan_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Title::class)->unique()->constrained();
            $table->integer("rental_duration_in_days");
            $table->decimal("price", 8, 2);
            $table->dateTime("effective_from");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_prices');
    }
};
