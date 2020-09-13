<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz_question;
use Faker\Generator as Faker;

$factory->define(Quiz_question::class, function (Faker $faker) {

    return [
        'content' => $faker->text,
        'categorie' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
