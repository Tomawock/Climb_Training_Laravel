<?php

use App\Exercise;
use Faker\Generator as Faker;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$factory->define(Exercise::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        'importantNotes' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'repsMin' => $faker->numberBetween($min = 0, $max = 50),
        'repsMax' => $faker->numberBetween($min = 0, $max = 50),
        'setMin' => $faker->numberBetween($min = 0, $max = 50),
        'setMax' => $faker->numberBetween($min = 0, $max = 50),
        'restMin' => $faker->time($format = 'H:i:s', $max = 'now'),
        'restMax' => $faker->time($format = 'H:i:s', $max = 'now'),
        'overweightMin' => $faker->numberBetween(0,50),
        'overweightMax' => $faker->numberBetween(0,50),
        'overweightUnit' => $faker->randomElement($array = array ('Kg','%')),
        'id_user' => 5,
    ];
});