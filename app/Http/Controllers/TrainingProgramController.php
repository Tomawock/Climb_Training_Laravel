<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\Exercise;
use Illuminate\Support\Facades\Redirect;

class TrainingProgramController extends Controller {

    public function index() {//DONE
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $trainingprogram = $dl->listTrainingProgram();
        $userId = $dl->getUserID($_SESSION['loggedName']);

        return view('trainingprogram.list')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('trainingprogram', $trainingprogram)->with('userId', $userId);
    }

    public function create() {//DONE
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $allExercises = $dl->listExercises();

        return view('trainingprogram.edit')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('allExercises', $allExercises);
    }

    public function store(Request $request) {//DONE     
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $dl->createTrainingProgram($request->input('trainingProgramTitle'), $request->input('trainingProgramDescription'), $request->input('trainingProgramTimeMin'), $request->input('trainingProgramTimeMax'));
        $idTp = $dl->getLastIdTrainingprogram();
        $tp = $dl->findCompleteTrainingProgramById($idTp);

        foreach ($dl->listExercises() as $ex) {
            //presente nell selezione della pagina e non preente sul db allora lo aggiungo
            if ($request->input('exercise' . $ex->id)) {
                $dl->createExerciseToTrainingprogram($ex->id, $idTp);
            }
        }
        
        return Redirect::to(route('trainingprogram.index'));
    }

    public function show($id) {//TODO
//        session_start();
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();
        $trainingprogram = $dl->findCompleteTrainingProgramById($id);
        
        return view('trainingprogram.show')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('trainingprogram',$trainingprogram);
    }

    public function edit($id) {//DONE     
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $trainingprogram = $dl->findCompleteTrainingProgramById($id);
        $allExercises = $dl->listExercises();

        return view('trainingprogram.edit')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('trainingprogram', $trainingprogram)->with('allExercises', $allExercises);
    }

    public function update(Request $request, $id) {//DONE
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $dl->editTrainingProgram($id,$request->input('trainingProgramTitle'), $request->input('trainingProgramDescription'), $request->input('trainingProgramTimeMin'), $request->input('trainingProgramTimeMax'));
        $tp = $dl->findCompleteTrainingProgramById($id);

        foreach ($dl->listExercises() as $ex) {
            //presente nell selezione della pagina e non preente sul db allora lo aggiungo
            if ($request->input('exercise' . $ex->id) !== null && !$tp->exercises->contains($ex->id) == 1) {
                $dl->createExerciseToTrainingprogram($ex->id, $id);
            } else if (!$request->input('exercise' . $ex->id) !== null && $tp->exercises->contains($ex->id) == 1) {
                //non preente nella selezione della pagina ma è preente nel db
                $dl->deleteExerciseToTrainingprogram($ex->id, $id);
            }
        }
        
        return Redirect::to(route('trainingprogram.index'));
    
    }

    public function destroy($id) {//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        $dl = new DataLayer();
         
        $tp = $dl->findCompleteTrainingProgramById($id);
        foreach ($tp->exercises as $ex){
            $dl->deleteExerciseToTrainingprogram($ex->id, $id);
        }
        
        $dl->deleteTrainingProgramToAllUser($id);
        $dl->deleteTrainingProgram($id);   

        return Redirect::to(route('trainingprogram.index'));
    }

    public function confirmDestroy($id) {//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();
        
        $tp=$dl->findCompleteTrainingProgramById($id);
        
        return view('trainingprogram.destroy')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('trainingprogram', $tp); 
    }

    public function addmytraining($id) {//DONE
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $trainingprogram = $dl->listTrainingProgram();
        $userId = $dl->getUserID($_SESSION['loggedName']);

        $dl->addTrainingprogramToUser($id, $userId);
        

        return view('trainingprogram.list')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('trainingprogram', $trainingprogram)->with('userId', $userId);
        
    }

}
