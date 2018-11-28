<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'user_type_id' =>$faker->numberBetween(1,2),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\UserDetail::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->sentence,
        'bank_id'=> 4,
        // Any other Fields in your Comments Model
    ];
});
$factory->define(App\BankDetails::class,function (Faker\Generator $faker) {
    return [
        'bank_name'=>$faker->name,
        'branch_name'=>$faker->name,
        'branch_code'=>$faker->name,
        'pincode_state_city_mapping_id'=>function(){
                        return factory(App\PincodeStateCityMapping::class)->create()->id;
        },
        'bank_type_id'=>function(){
                        return factory(App\BankType::class)->create()->id;
        },
    ];
});

$factory->define(App\PincodeStateCityMapping::class, function (Faker\Generator $faker) {
    return [
        'pincode' =>  $faker->randomDigit,
        'area_location'=> $faker->firstNameMale,
        'city_id'=> 1,
        'state_id'=> 1,
        'geographical_location'=>2,
        // Any other Fields in your Comments Model
    ];
});

$factory->define(App\BankType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        // Any other Fields in your Comments Model
    ];
});

/*$factory->states(App\BankDetails::class,'1',function(Faker\Generator $faker){
    return[
        'bank_type_id'=>'1',
        ];
});*/