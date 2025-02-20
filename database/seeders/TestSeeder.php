<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\LoanPrice;
use App\Models\Title;
use App\Models\User;
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

        $this->call(GenreSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(BookConditionSeeder::class);
        $this->call(BookStatusSeeder::class);
        $this->call(RolePermissionSeeder::class);

        Title::factory(50)
            ->has(LoanPrice::factory())
            ->create();
        Book::factory(300)->create();

        User::factory(2)->admin()->create();

        User::factory(2)->librarian()->create();

        User::factory(10)->patron()->withLoans(5)->create();
    }
}
