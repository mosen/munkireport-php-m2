<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\Event\Event::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'type' => $faker->word,
        'module' => $faker->word,
        'msg' => $faker->text,
        'data' => $faker->text
    ];
});