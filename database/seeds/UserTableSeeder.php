<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array
        (
            [
                'name' => 'Jordy',
                'last_name' => 'Jiménez',
                'email' => 'unforgivendk1001@gmail.com',
                'user' => 'jjcISW',
                'password' => \Hash::make('123456'),
                'type' => 'admin',
                'active' => 1,
                'address' => 'Almoloya del Rio, 52540',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'name' => 'Catherine',
                'last_name' => 'Castro',
                'email' => 'cath_96@gmail.com',
                'user' => 'Cath',
                'password' => \Hash::make('123456'),
                'type' => 'user',
                'active' => 1,
                'address' => 'Almoloya del Rio, 52540',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );

        User::insert($data);
    }
}
