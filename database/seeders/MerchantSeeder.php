<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $settlement_method = ['Seamless', 'No Settlement'];
        User::factory()->count('75')->create()->each(function (User $user) use ($faker, $settlement_method) {
            $user->assignRole('merchant');
            $user->setData('company', $faker->company());
            $user->setData('balance', random_int(10000, 500000));
            $user->setData('merchant_type', 'Merchant');
            $user->setData('settlement_method', $settlement_method[array_rand($settlement_method)]);
            $user->setData('fund_out_commission', $faker->randomFloat(2, 1, 4));
            $user->setData('fund_in_commission', $faker->randomFloat(2, 1, 4));
            $user->save();
        });
    }
}
