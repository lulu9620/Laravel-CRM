<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Laurentiu',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);
    }
}
