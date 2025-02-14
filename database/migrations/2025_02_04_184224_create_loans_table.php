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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Book::class)->constrained();
            $table->foreignIdFor(App\Models\User::class)->constrained();
            $table->date('return_date');
            $table->date('due_date');
            $table->unsignedBigInteger('returned_by_staff');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('returned_by_staff')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
