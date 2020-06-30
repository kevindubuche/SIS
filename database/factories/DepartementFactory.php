<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Departement;
use Faker\Generator as Faker;

$factory->define(Departement::class, function (Faker $faker) {

    return [
        'faculty_id' => $faker->randomDigitNotNull,
        'departement_name' => $faker->word,
        'departement_code' => $faker->word,
        'departement_description' => $faker->word,
        'status' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
