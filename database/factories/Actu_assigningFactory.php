<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Actu_assigning;
use Faker\Generator as Faker;

$factory->define(Actu_assigning::class, function (Faker $faker) {

    return [
        'actu_id' => $faker->randomDigitNotNull,
        'class_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
