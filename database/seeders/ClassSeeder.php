<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class ClassSeeder extends Seeder
{

    const ClASSES = [
        'Animation',
        'App development',
        'Audio production',
        'Computer programming',
        'Media technology',
        'Music production',
        'Typing',
        'Web design',
        'Word processing',
        'Web programming',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ClASSES as $CLASS) {
            Classes::updateOrCreate([
                'name' => $CLASS
            ], [
                'name' => $CLASS
            ]);
        }
    }
}
