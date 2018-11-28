<?php

use Illuminate\Database\Seeder;

class BankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BankDetails::class, 50)->create()->make();
        //$users = factory(App\BankDetails::class, 5)->states('1', '2')->make();
        /*$factory->define(App\BankDetails::class, function (Faker\Generator $faker) {
            return [
                'user_id' => $faker->sentence,
                'bank_id'=> 4,
                'bank_name'=>$faker->bank_name,
                'branch_name'=>$faker->name,
                'branch_code'=>$faker->name,
                // Any other Fields in your Comments Model
            ];
        });*/
    }
}
