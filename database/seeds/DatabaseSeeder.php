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
        DB::table('users')->insert([
            'name' => 'Lorenzo',
            'email' => 'l.tomasetti@studenti.unibs.it',
            'password' => bcrypt('12345678'),
            'is_admin' => FALSE,
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@google.it',
            'password' => bcrypt('12345678'),
            'is_admin' => TRUE,
        ]);
        
        $dl = new DataLayer();
        $id_user= $dl->getUserID('Admin');
        $dl->createTool('Climbing Wall');
        $dl->createTool('Rubber Band');
        $dl->createTool('Weights');
        $dl->createTool('Exercise Band');
        $dl->createTool('Rings');
        $dl->createTool('TRX');
        $dl->createTool('Pull-up Bar');
        $dl->createTool('Fingerboard');
        $dl->createTool('Campusboard');

        factory(Exercise::class,20)->create(['id_user'=>$id_user]);
        
        factory(TrainingProgram::class,20)->create();
    }

}
