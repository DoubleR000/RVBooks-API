<?php

namespace Database\Seeders;

use App\Models\RentalPeriodUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalPeriodUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            'Day',
            'Week',
            'Month',
            'Year'
        ];

        foreach ($units as $unit) {
            RentalPeriodUnit::firstOrCreate(
                [
                    'period' => $unit
                ]
            );
        }

    }
}
