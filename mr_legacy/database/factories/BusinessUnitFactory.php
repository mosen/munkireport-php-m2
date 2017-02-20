<?php

$factory->define(MrLegacy\BusinessUnit::class, function (Faker\Generator $faker) {

    $properties = [
        \MrLegacy\BusinessUnit::PROP_ADDRESS,
        \MrLegacy\BusinessUnit::PROP_LINK,
        \MrLegacy\BusinessUnit::PROP_MACHINE_GROUP,
        \MrLegacy\BusinessUnit::PROP_MANAGER,
        \MrLegacy\BusinessUnit::PROP_NAME,
        \MrLegacy\BusinessUnit::PROP_USER
    ];

    return [
        'unitid' => $faker->randomNumber,
        'property' => $faker->randomElement($properties),
        'value' => $faker->randomNumber
    ];
});