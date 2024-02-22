<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                [
                    "name" => 'Ahmet',
                    "surname" => 'Yılmaz',
                    "email" => 'ahmet@mail.com',
                    "password" => Hash::make('abcd1234'),
                ],
                [
                    "name" => 'Mehmet',
                    "surname" => 'Yılmaz',
                    "email" => 'mehmet@mail.com',
                    "password" => Hash::make('abcd1234'),
                ],
                [
                    "name" => 'Yılmaz',
                    "surname" => 'Mehmet',
                    "email" => 'yilmaz@mail.com',
                    "password" => Hash::make('abcd1234'),
                ]
            ]
        );
    }
}
