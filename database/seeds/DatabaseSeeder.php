<?php

use Illuminate\Database\Seeder;
use App\DataLayer;
use App\Exercise;
use App\TrainingProgram;


class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {   
//        NOT TEST
//        DB::table('users')->insert([
//            'name' => 'Lorenzo',
//            'email' => 'l.tomasetti@studenti.unibs.it',
//            'password' => bcrypt('12345678'),
//            'is_admin' => FALSE,
//        ]);
//        DB::table('users')->insert([
//            'name' => 'Admin',
//            'email' => 'admin@google.it',
//            'password' => bcrypt('12345678'),
//            'is_admin' => TRUE,
//        ]);
//        DB::table('users')->insert([
//            'name' => 'Admin2',
//            'email' => 'admin2@google.it',
//            'password' => bcrypt('12345678'),
//            'is_admin' => TRUE,
//        ]);
//        DB::table('users')->insert([
//            'name' => 'Mario',
//            'email' => 'm.rossi@studenti.unibs.it',
//            'password' => bcrypt('12345678'),
//            'is_admin' => FALSE,
//        ]);
//        
//        $dl = new DataLayer();
//        $dl->createTool('Climbing Wall');
//        $dl->createTool('Rubber Band');
//        $dl->createTool('Weights');
//        $dl->createTool('Exercise Band');
//        $dl->createTool('Rings');
//        $dl->createTool('TRX');
//        $dl->createTool('Pull-up Bar');
//        $dl->createTool('Fingerboard');
//        $dl->createTool('Campusboard');
//
//        factory(Exercise::class,20)->create(['id_user'=>$dl->getUserID('Admin')]);
//        factory(Exercise::class,10)->create(['id_user'=>$dl->getUserID('Mario')]);
//        factory(Exercise::class,10)->create(['id_user'=>$dl->getUserID('Lorenzo')]);
//        
//        factory(TrainingProgram::class,10)->create(['id_user'=>$dl->getUserID('Admin')]);
//        factory(TrainingProgram::class,10)->create(['id_user'=>$dl->getUserID('Mario')]);
//        factory(TrainingProgram::class,10)->create(['id_user'=>$dl->getUserID('Lorenzo')]);
//
//        // Fo each training program we attach 1 to 5 exercise, EVERY TP HAS 1 ore more EXERCISE
//        // Get all the exercise attacable to Admin
//        $exercisesAdm = App\Exercise::where('id_user',$dl->getUserID('Admin'))->get();
//        // Populate the pivot table
//        App\TrainingProgram::where('id_user',$dl->getUserID('Admin'))->each(function ($trainingprogram) use ($exercisesAdm) { 
//            $trainingprogram->exercises()->attach(
//                $exercisesAdm->random(rand(1, 5))->pluck('id')->toArray()
//            ); 
//        });
//        // Get all the exercise attacable to Lorenzo
//        $exercisesLor = App\Exercise::where('id_user',$dl->getUserID('Lorenzo'))->get();
//        // Populate the pivot table
//        App\TrainingProgram::where('id_user',$dl->getUserID('Lorenzo'))->each(function ($trainingprogram) use ($exercisesLor) { 
//            $trainingprogram->exercises()->attach(
//                $exercisesLor->random(rand(1, 5))->pluck('id')->toArray()
//            ); 
//        });
//        // Get all the exercise attacable to Mario
//        $exercisesMar = App\Exercise::where('id_user',$dl->getUserID('Mario'))->get();
//        // Populate the pivot table
//        App\TrainingProgram::where('id_user',$dl->getUserID('Mario'))->each(function ($trainingprogram) use ($exercisesMar) { 
//            $trainingprogram->exercises()->attach(
//                $exercisesMar->random(rand(1, 5))->pluck('id')->toArray()
//            ); 
//        });
//        FOR EXPERIMENTS
        DB::table('users')->insert([
            'name' => 'Lorenzo',
            'email' => 'lorenzo.tomasetti@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => FALSE,
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin.admin@gmail.com',
            'password' => bcrypt('123admin'),
            'is_admin' => TRUE,
        ]);
        
        $dl = new DataLayer();
        $dl->createTool('Rubber Band');
        $dl->createTool('Rings');
        $dl->createTool('TRX');
        $dl->createTool('Fingerboard');
        $dl->createTool('Campusboard');
        
        //creo 11 esercizi visibuli a tutti gli utenti
        $dl->createExercise("Esercizio_1", "Descrizione_1", "Note_1", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_2", "Descrizione_2", "Note_2", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_3", "Descrizione_3", "Note_3", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_4", "Descrizione_4", "Note_4", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_5", "Descrizione_5", "Note_5", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_6", "Descrizione_6", "Note_6", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_7", "Descrizione_7", "Note_7", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_8", "Descrizione_8", "Note_8", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_9", "Descrizione_9", "Note_9", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Esercizio_10", "Descrizione_10", "Note_10", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        $dl->createExercise("Trazione", "Descrizione_Trazione", "Note_Trazione", 1, 10, 1, 10, date('H:i:s', (5 * 60)), date('H:i:s', (5 * 60)), 10, 20, 'Kg', NULL);
        
        $dl->createTrainingProgram("Scheda_1", 'Descrizione_1', date('H:i:s', (30 * 60)), date('H:i:s', (40 * 60)), $dl->getUserID('Admin'));
        $dl->createTrainingProgram("Scheda_2", 'Descrizione_1', date('H:i:s', (30 * 60)), date('H:i:s', (40 * 60)), $dl->getUserID('Admin'));
        $dl->createTrainingProgram("Scheda_3", 'Descrizione_1', date('H:i:s', (30 * 60)), date('H:i:s', (40 * 60)), $dl->getUserID('Admin'));
        $dl->createTrainingProgram("Scheda_4", 'Descrizione_1', date('H:i:s', (30 * 60)), date('H:i:s', (40 * 60)), $dl->getUserID('Admin'));
    }

}
