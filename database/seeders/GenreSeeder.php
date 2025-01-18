<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Action',
            'Adventure',
            'Anthology',
            'Art',
            'Autobiography',
            'Biography',
            'Children\'s',
            'Classic',
            'Comic Book',
            'Coming-of-age',
            'Contemporary',
            'Cookbook',
            'Crime',
            'Drama',
            'Dystopian',
            'Encyclopedia',
            'Fantasy',
            'Fiction',
            'Graphic Novel',
            'Guide',
            'Health',
            'Historical Fiction',
            'History',
            'Horror',
            'Humor',
            'Literary Fiction',
            'Memoir',
            'Mystery',
            'Paranormal Romance',
            'Philosophy',
            'Poetry',
            'Political Thriller',
            'Psychological Thriller',
            'Religion',
            'Romance',
            'Satire',
            'Science Fiction',
            'Self-Help',
            'Short Story',
            'Spirituality',
            'Sports',
            'Thriller',
            'Travel',
            'True Crime',
            'Young Adult',
            'Western',
        ];

        foreach ($genres as $genre) {
            Genre::firstOrCreate(['name' => $genre]);
        }
    }
}
