<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call("migrate:fresh");

        $this->call(GenreSeeder::class);
        Title::factory(50)->create();

    }
}
