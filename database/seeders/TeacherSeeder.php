<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class TeacherSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Teacher::create([
                'name' => $faker->name
            ]);
        }
    }
}
