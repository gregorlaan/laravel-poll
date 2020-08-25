<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

use App\Poll;
use App\Question;
use App\Choice;

$factory->define(Poll::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => factory(App\User::class)
    ];
});

$factory->define(Question::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(Choice::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});