<?php

use Illuminate\Database\Seeder;
use App\Myuser;
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
        
        Myuser::create([
            'name' => 'pippo',
            'surname' => 'pippo',
            'username' => 'pippo',
            'password' => md5('pippo'),
            'email' => 'hey@pippo.it'
        ]);

        Myuser::create([
            'name' => 'pluto',
            'surname' => 'pluto',
            'username' => 'pluto',
            'password' => md5('pluto'),
            'email' => 'pluto@pluto.it'
        ]);

        $dl = new DataLayer();
        $user1 = $dl->getUserID('pippo');
        $user2 = $dl->getUserID('pluto');
        
        factory(Exercise::class,20)->create();
        
        factory(TrainingProgram::class,20)->create();
        
        $exes = Exercise::all();

        //factory(Photo::class, 10)->create(['id_exercise' => rand($exes)]);
//        
//        factory(Author::class, 10)->create(['user_id' => $user2])->each(function($author) {
//            factory(Book::class, 10)->create(['author_id' => $author->id, 'user_id' => $author->user_id]);
//        });  

//        factory(Author::class, 100)->create(['user_id' => $user1]);
//        $authors_list1 = json_decode($dl->listAuthors($user1));
//
//        for ($i = 0; $i < 50; $i++) {
//            $author = $authors_list1[array_rand($authors_list1)];
//            factory(Book::class, 1)->create(['author_id' => $author->id, 'user_id' => $author->user_id]);
//        }
//
//        factory(Author::class, 100)->create(['user_id' => $user2]);
//        $authors_list2 = json_decode($dl->listAuthors($user2));
//        for ($i = 0; $i < 50; $i++) {
//            $author = $authors_list2[array_rand($authors_list2)];
//            factory(Book::class, 1)->create(['author_id' => $author->id, 'user_id' => $author->user_id]);
//        }
    }

}
