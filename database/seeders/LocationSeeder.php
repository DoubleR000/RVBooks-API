<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Fiction',
                'description' => 'All fiction books.',
                'parent_id' => null,
            ],
            [
                'name' => 'Kids',
                'description' => 'Books for children.',
                'parent_id' => null,
            ],
            [
                'name' => 'Non-Fiction',
                'description' => 'All non-fiction books.',
                'parent_id' => null,
            ],
            [
                'name' => 'Reference',
                'description' => 'Reference materials.',
                'parent_id' => null,
            ],
            [
                'name' => 'Periodicals',
                'description' => 'Magazines, journals, and newspapers.',
                'parent_id' => null,
            ],

            // Fiction Sub-Locations
            [
                'name' => 'Science Fiction',
                'description' => 'Science fiction novels.',
                'parent_id' => 1,
            ],
            [
                'name' => 'Fantasy',
                'description' => 'Fantasy novels.',
                'parent_id' => 1,
            ],
            [
                'name' => 'Mystery',
                'description' => 'Mystery and thriller novels.',
                'parent_id' => 1,
            ],
            [
                'name' => 'Historical Fiction',
                'description' => 'Historical fiction novels.',
                'parent_id' => 1,
            ],

            // Kids Sub-Locations
            [
                'name' => 'Picture Books',
                'description' => 'Picture books for toddlers and preschoolers.',
                'parent_id' => 2,
            ],
            [
                'name' => 'Early Readers',
                'description' => 'Books for beginning readers.',
                'parent_id' => 2,
            ],
            [
                'name' => 'Middle Grade',
                'description' => 'Books for middle school students.',
                'parent_id' => 2,
            ],
            [
                'name' => 'Young Adult (YA)',
                'description' => 'Books for teenagers.',
                'parent_id' => 2,
            ],

            // Non-Fiction Sub-Locations
            [
                'name' => 'History',
                'description' => 'History books.',
                'parent_id' => 3,
            ],
            [
                'name' => 'Biography',
                'description' => 'Biographies and autobiographies.',
                'parent_id' => 3,
            ],
            [
                'name' => 'Science',
                'description' => 'Science books.',
                'parent_id' => 3,
            ],
            [
                'name' => 'Self-Help',
                'description' => 'Self-improvement books.',
                'parent_id' => 3,
            ],

            // Reference Sub-Locations
            [
                'name' => 'Dictionaries',
                'description' => 'Dictionaries and thesauruses.',
                'parent_id' => 4,
            ],
            [
                'name' => 'Encyclopedias',
                'description' => 'Encyclopedias and other reference works.',
                'parent_id' => 4,
            ],
            [
                'name' => 'Atlases',
                'description' => 'Maps and atlases.',
                'parent_id' => 4,
            ],

            // Periodicals Sub-Locations
            [
                'name' => 'Magazines',
                'description' => 'General interest and special interest magazines.',
                'parent_id' => 5,
            ],
            [
                'name' => 'Journals',
                'description' => 'Academic and professional journals.',
                'parent_id' => 5,
            ],
            [
                'name' => 'Newspapers',
                'description' => 'Local and national newspapers.',
                'parent_id' => 5,
            ],
        ];

        foreach ($locations as $location) {
            Location::firstOrCreate([
                'name' => $location['name'],
                'description' => $location['description'],
                'parent_id' => $location['parent_id']
            ]);
        }
    }
}
