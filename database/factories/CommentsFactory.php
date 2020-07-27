<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comments;
use Faker\Generator as Faker;

$factory->define(Comments::class, function (Faker $faker) {

    return [
        'created_by' => $faker->randomDigitNotNull,
        'actu_id' => $faker->word,
        'body' => $faker->text,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
