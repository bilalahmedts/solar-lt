<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Super Admin',
            'email' => 'admin@touchstone.com.pk',
            'password' => Hash::make('test123'),
            'status' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ));

/*         $faker = Faker::create();
        foreach (range(1, 6) as $index) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->safeEmail,
                'password' => Hash::make('touch123'),
                'status' => $faker->randomElement([0, 1]),
                'created_at' => $faker->date("Y-m-d H:i:s"),
                'updated_at' => $faker->date("Y-m-d H:i:s")
            ]);
        } */
    }
}
