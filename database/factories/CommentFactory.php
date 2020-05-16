<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'post_id' => $faker-> numberBetween(1,1500),
        'author_id' => $faker->numberBetween(1,100)
    ];
});
