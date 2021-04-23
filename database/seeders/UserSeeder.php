<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    const USERS = [
        [
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::USERS as $USER) {
            $USER['password'] = Hash::make('secret');
            try {
                $user = new User();
                $user->name = $USER['name'];
                $user->email = $USER['email'];
                $user->password = $USER['password'];
                $user->role()->associate(1);
                $user->save();
            } catch (QueryException $e) {
                continue;
            }
        }
    }
}
