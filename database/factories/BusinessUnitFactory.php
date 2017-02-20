<?php

$factory->define(Mr\BusinessUnit::class, function (Faker\Generator $faker) {

    $properties = [
        \Mr\BusinessUnit::PROP_ADDRESS,
        \Mr\BusinessUnit::PROP_LINK,
        \Mr\BusinessUnit::PROP_MACHINE_GROUP,
        \Mr\BusinessUnit::PROP_MANAGER,
        \Mr\BusinessUnit::PROP_NAME,
        \Mr\BusinessUnit::PROP_USER
    ];

    return [
        'unitid' => $faker->randomNumber,
        'property' => $faker->randomElement($properties),
        'value' => $faker->randomNumber
    ];
});