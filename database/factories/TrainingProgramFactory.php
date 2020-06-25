<?php

use App\TrainingProgram;
use Faker\Generator as Faker;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$factory->define(TrainingProgram::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 30, $variableNbWords = true),
        
        'timeMin' => $faker->time($format = 'H:i:s', $max = 'now'),
        'timeMax' => $faker->time($format = 'H:i:s', $max = 'now')
        
    ];
});