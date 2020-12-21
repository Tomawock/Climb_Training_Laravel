<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\TrainingProgram;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TrainingProgramController extends Controller {

    public function index() {//DONE
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $trainingprogram = $dl->listTrainingProgram();
        $userId = $dl->getUserID(Auth::user()->name);
        
        $bloked=array();
        foreach ($trainingprogram as $tp){
            if ($dl->isIdTrainingprogramBlocked($tp->id)){
                $bloked[]=$tp->id;
            }
        }

        return view('trainingprogram.list')->with('trainingprogram', $trainingprogram)
                ->with('userId', $userId)->with('bloked',$bloked);
    }

    public function create() {
        $dl = new DataLayer();
        // When we create a new TP we want only the user copied or created exercise
        $actualuserId= Auth::user()->id;
        $allExercises = $dl->listExercisesUserById($actualuserId);

        return view('trainingprogram.edit')->with('allExercises', $allExercises);
    }

    public function store(Request $request) {
        
        $this->validate($request, TrainingProgram::$rules);
        
        $dl = new DataLayer();
        $actualuserId= Auth::user()->id;
        $allExercises = $dl->listExercisesUserById($actualuserId);
        $dl->createTrainingProgram($request->input('trainingProgramTitle'), $request->input('trainingProgramDescription'), $request->input('trainingProgramTimeMin'), $request->input('trainingProgramTimeMax'));
        $idTp = $dl->getLastIdTrainingprogram();
        $tp = $dl->findCompleteTrainingProgramById($idTp);
        
        foreach ($allExercises as $ex) {
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
        
        return view('trainingprogram.show')->with('trainingprogram',$trainingprogram);
    }

    public function edit($id) {

        $dl = new DataLayer();
                $actualuserId= Auth::user()->id;
        $allExercises = $dl->listExercisesUserById($actualuserId);
        $trainingprogram = $dl->findCompleteTrainingProgramById($id);

        return view('trainingprogram.edit')->with('trainingprogram', $trainingprogram)->with('allExercises', $allExercises);
    }

    public function update(Request $request, $id) {
        $this->validate($request, TrainingProgram::$rules);
        
        $dl = new DataLayer();
        $dl->editTrainingProgram($id,$request->input('trainingProgramTitle'), $request->input('trainingProgramDescription'), $request->input('trainingProgramTimeMin'), $request->input('trainingProgramTimeMax'));
        $tp = $dl->findCompleteTrainingProgramById($id);
        $actualuserId= Auth::user()->id;
        $allExercises = $dl->listExercisesUserById($actualuserId);
        
        foreach ($allExercises as $ex) {
            //presente nell selezione della pagina e non preente sul db allora lo aggiungo
            if ($request->input('exercise' . $ex->id) != null && !$tp->exercises->contains($ex->id) == 1) {
                $dl->createExerciseToTrainingprogram($ex->id, $id);
            } else if (!$request->input('exercise' . $ex->id) != null && $tp->exercises->contains($ex->id) == 1) {
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
        
        return view('trainingprogram.destroy')->with('trainingprogram', $tp); 
    }

    public function addmytraining($id) {//DONE
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $trainingprogram = $dl->listTrainingProgram();
        $userId = $dl->getUserID(Auth::user()->name);

        $dl->addTrainingprogramToUser($id, $userId);
        
         $bloked=array();
        foreach ($trainingprogram as $tp){
            if ($dl->isIdTrainingprogramBlocked($tp->id)){
                $bloked[]=$tp->id;
            }
        }

        return view('trainingprogram.list')->with('trainingprogram', $trainingprogram)->with('userId', $userId)->with('bloked',$bloked);
        
    }

}
