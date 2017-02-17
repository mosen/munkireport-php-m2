<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Mr\Tag::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'tag' => $faker->word,
        'user' => $faker->userName,
    ];
});