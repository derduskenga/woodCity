<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->command->info('Roles ans Permissions seeded! \0/');

        $this->call(StatusesTableSeeder::class);
        $this->command->info('Status Table seeded seeded!');

    }
}
