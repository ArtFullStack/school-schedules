<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeekDay;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WeekDaysSeeder extends Seeder
{

    const WEEK_DAYS = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::WEEK_DAYS as $DAY) {
            WeekDay::updateOrCreate(
                [
                    'name' => $DAY
                ],
                [
                    'name' => $DAY
                ]);
        }
    }
}
