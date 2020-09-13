<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NoteQuiz;
use Faker\Generator as Faker;

$factory->define(NoteQuiz::class, function (Faker $faker) {

    return [
        'id_student' => $faker->randomDigitNotNull,
        'quiz_id' => $faker->randomDigitNotNull,
        'score' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
