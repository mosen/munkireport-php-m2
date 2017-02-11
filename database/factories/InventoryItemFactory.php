<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\ARD\ARDInfo::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'name' => $faker->words,
        'version' => $faker->numerify('#.#.#'),
        'bundleid' => $faker->domainName,
        'bundlename' => $faker->words,
        'path' => '/path/to/app'
    ];
});