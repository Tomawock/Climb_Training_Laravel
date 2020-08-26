<?php

use Illuminate\Database\Seeder;
use App\DataLayer;
use App\Exercise;
use App\TrainingProgram;
use App\Photo;
use App\Tool;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        
//        Myuser::create([
//            'name' => 'pippo',
//            'surname' => 'pippo',
//            'username' => 'pippo',
//            'password' => md5('pippo'),
//            'email' => 'hey@pippo.it'
//        ]);
//
//        Myuser::create([
//            'name' => 'pluto',
//            'surname' => 'pluto',
//            'username' => 'pluto',
//            'password' => md5('pluto'),
//            'email' => 'pluto@pluto.it'
//        ]);
//
//        $dl = new DataLayer();
//        $user1 = $dl->getUserID('pippo');
//        $user2 = $dl->getUserID('pluto');
//          
        DB::table('users')->insert([
            'name' => 'Lorenzo',
            'email' => 'l.tomasetti@studenti.unibs.it',
            'password' => bcrypt('12345678'),
        ]);
        
        $dl = new DataLayer();
        $dl->createTool('Climbing Wall');
        $dl->createTool('Rubber Band');
        $dl->createTool('Weights');
        $dl->createTool('Exercise Band');
        $dl->createTool('Rings');
        $dl->createTool('TRX');
        $dl->createTool('Pull-up Bar');
        $dl->createTool('Fingerboard');
        $dl->createTool('Campusboard');
        
        $dl->createExercise("Name", "Description", "important NOtes", $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit);
        
        $dl->createExercise("Name", "Description", "important NOtes", $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit);
        $dl->createExercise("Name", "Description", "important NOtes", $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit);
        $dl->createExercise("Name", "Description", "important NOtes", $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit);


        //factory(Exercise::class,20)->create();
        
        //factory(TrainingProgram::class,20)->create();
    }

}
