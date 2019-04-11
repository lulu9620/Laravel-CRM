<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Company');
        for ($i = 0; $i < 35; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->email,
                'logo' => $faker->image,
                'website' => $faker->safeEmailDomain,
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
