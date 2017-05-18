<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$uBI8wpkBfb.jW7Gb8lEYlOUlbwGnQSyFMVq5GQIIe7xqhn..unFIG', 'role_id' => 1, 'remember_token' => '', 'device_id' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
