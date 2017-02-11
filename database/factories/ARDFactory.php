<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\ARD\ARDInfo::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'Text1' => $faker->text,
        'Text2' => $faker->text,
        'Text3' => $faker->text,
        'Text4' => $faker->text
    ];
});