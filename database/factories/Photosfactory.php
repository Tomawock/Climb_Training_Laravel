<?php

use App\Photo;
use Faker\Generator as Faker;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$factory->define(Photo::class, function (Faker $faker) {
    
    
    $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));
    return [
        'path' => $faker->$faker->imageUrl(500,500),
        'description' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        
    ];
});