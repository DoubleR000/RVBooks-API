<?php

namespace Database\Seeders;

use App\Models\BookCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookConditions = [
            [
                'name' => 'New',
                'description' => 'The book is in perfect, unused condition. No visible wear, marks, or defects. Often shrink-wrapped if sold as part of a set or collectible edition.'
            ],
            [
                'name' => 'Like New / As New',
                'description' => 'The book looks as if it has just been purchased and opened but has no obvious signs of wear. No markings, stains, or creases. The dust jacket (if applicable) is pristine, with no tears or scuffs.'
            ],
            [
                'name' => 'Very Good',
                'description' => 'The book has been read but remains in excellent condition. Minor signs of wear, such as slightly bent corners or light shelf wear. No highlighting, underlining, or annotations. The dust jacket, if included, may have light wear but no major damage.'
            ],
            [
                'name' => 'Good',
                'description' => 'The book shows signs of use but is still functional and readable. There may be minor damage, such as scuffed edges, a creased spine, or small stains. May contain limited markings (e.g., a name on the first page or some underlining). The dust jacket (if applicable) may have small tears or wear.'
            ],
            [
                'name' => 'Acceptable / Fair',
                'description' => 'The book is still usable but shows significant wear and tear. Possible defects include worn or damaged covers, a heavily creased spine, or loose but intact binding. There may be extensive markings, highlighting, or notes. The dust jacket (if applicable) may be missing or heavily damaged.'
            ],
            [
                'name' => 'Poor',
                'description' => 'The book is heavily damaged and barely functional. Examples include missing pages, a broken spine, or excessive staining. This grade is rarely sold unless it’s a rare or collectible item. Typically sold "as-is" or for parts (e.g., salvaging illustrations or covers).'
            ]
        ];

        foreach ($bookConditions as $condition) {
            BookCondition::firstOrCreate($condition);
        }
    }
}
