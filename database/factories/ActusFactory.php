<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Actus;
use Faker\Generator as Faker;

$factory->define(Actus::class, function (Faker $faker) {

    return [
        'created_by' => $faker->randomDigitNotNull,
        'title' => $faker->word,
        'body' => $faker->text,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
