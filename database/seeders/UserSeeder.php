<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $roles = ['user','manager','merchant','finance','payout'];

        if (User::all()->count() == 0){
            User::factory()->create([
                'first_name' => 'maryam',
                'last_name' => 'dadras',
                'username' => 'maryamdadras',
                'status' => 1,
            ])->each(function (User $user){
                $user->assignRole('user','manager');
            });
        }

        User::factory()->count('50')->make()->each(function (User $user) use ($roles) {
            $user->assignRole($roles[array_rand($roles)]);
            $user->save();
        });
    }
}
