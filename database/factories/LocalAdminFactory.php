<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\LocalAdmin\LocalAdmin::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'users' => $faker->userName
    ];
});