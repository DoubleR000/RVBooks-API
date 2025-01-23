<?php

namespace Database\Seeders;

use App\Models\BookStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookStatuses = [
            [
                "name" => "Available",
                "description" => "The book is on the shelf and ready to be borrowed."
            ],
            [
                "name" => "Checked Out",
                "description" => "Someone has borrowed the book and it's due back on a specific date."
            ],
            [
                "name" => "On Hold",
                "description" => "Someone has requested the book and it's being held for them to pick up."
            ],
            [
                "name" => "In Process",
                "description" => "The book is new or has just been returned and is being processed (cataloged, labeled, etc.) before it's available."
            ],
            [
                "name" => "In Transit",
                "description" => "The book is being moved between different library locations."
            ],
            [
                "name" => "Library Use Only",
                "description" => "This book cannot be borrowed and must be used within the library. Also known as Reference."
            ],
            [
                "name" => "Missing",
                "description" => "The book cannot be found on the shelves and is considered lost."
            ],
            [
                "name" => "Repair",
                "description" => "The book is being repaired and is temporarily unavailable."
            ],
            [
                "name" => "On Order",
                "description" => "The library has ordered the book but hasn't received it yet."
            ],
            [
                "name" => "Withdrawn",
                "description" => "The book has been permanently removed from the library's collection."
            ],
            [
                "name" => "Lost - Claimed Returned",
                "description" => "The book has been reported lost by the borrower, but they claim to have returned it."
            ]
        ];

        foreach ($bookStatuses as $bookStatus) {
            BookStatus::firstOrCreate(attributes: $bookStatus);
        }
    }
}
