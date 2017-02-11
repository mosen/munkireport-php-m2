<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\GSX\GSXInfo::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'warrantystatus' => $faker->word,
        'coverageenddate' => $faker->dateTimeThisDecade,
        'coveragestartdate' => $faker->dateTimeThisDecade,
        'daysremaining' => $faker->numberBetween(0, 100),
        'estimatedpurchasedate' => $faker->dateTimeThisDecade,
        'purchasecountry' => $faker->country,
        'registrationdate' => $faker->dateTimeThisDecade,
        'productdescription' => $faker->words,
        'configdescription' => $faker->words,
        'contractcoverageenddate' => $faker->dateTimeThisDecade,
        'contractcoveragestartdate' => $faker->dateTimeThisDecade,
        'contracttype' => $faker->word,
        'laborcovered' => $faker->word,
        'partcovered' => $faker->word,
        'warrantyreferenceno' => $faker->numberBetween(0, 10000),
        'isloaner' => $faker->boolean,
        'warrantymod' => $faker->word,
        'isvintage' => $faker->boolean,
        'isobsolete' => $faker->boolean
    ];
});