<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Soumission;
use Faker\Generator as Faker;

$factory->define(Soumission::class, function (Faker $faker) {

    return [
        'course_id' => $faker->randomDigitNotNull,
        'class_id' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'filename' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_by' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
