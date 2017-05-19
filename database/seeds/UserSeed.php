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
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$JmELUkF1aIGb0PpMXDw7guGj7pZJ7eL5T/EBUf68ctcYy8A/h4yPi', 'role_id' => 1, 'remember_token' => '', 'device_id' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
