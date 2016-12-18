<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([
            'name' => 'pending',
            'description' => 'Orders that are pending'
        ]);

        DB::table('statuses')->insert([
            'name' => 'completed',
            'description' => 'Orders that are completed'
        ]);

        DB::table('statuses')->insert([
            'name' => 'returned',
            'description' => 'Orders that are returned'
        ]);

        DB::table('statuses')->insert([
            'name' => 'cancelled',
            'description' => 'Orders that are cancelled'
        ]);
    }
}
