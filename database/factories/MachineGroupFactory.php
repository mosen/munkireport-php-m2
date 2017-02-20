<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Mr\MachineGroup::class, function (Faker\Generator $faker) {
    $properties = [
        \Mr\MachineGroup::PROP_NAME,
        \Mr\MachineGroup::PROP_KEY
    ];

    return [
        'groupid' => $faker->randomNumber,
        'property' => $faker->randomElement($properties),
        'value' => $faker->randomNumber
    ];
});