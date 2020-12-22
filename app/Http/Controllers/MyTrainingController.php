<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use Illuminate\Support\Facades\Auth;

class MyTrainingController extends Controller {

    public function information() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $user = $dl->getUserbyUsername(Auth::user()->name);
        $admins = $dl->getAllAdmins();

        return view('mytraining.information')->with('user', $user)->with('admins',$admins);
    }

    public function programlist() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $user = $dl->getUserbyUsername(Auth::user()->name);


        return view('mytraining.programlist')->with('user', $user);
    }

    public function historystatistic2() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $tosend = array();
        $userId = $dl->getUserID(Auth::user()->name);
        $tpexecution = $dl->getUserTrainingProgramExecutionByUserId($userId);

        $date = null;
        $tpid = null;
        foreach ($tpexecution as $ex) {
            if ($ex->pivot->date != $date || $ex->id != $tpid) {
                $date = $ex->pivot->date;
                $tpid = $ex->id;
                $tosend['title'][] = $ex->title;
                $tosend['date'][] = $ex->pivot->date;
                $tosend['exercises'][] = $dl->getUserTrainingProgramExecutionByUserIdDateAndTrainingProgram($userId, $date, $tpid);
            }
        }
        //dd($tosend==null);
        if ($tosend == null) {
            return view('mytraining.historystatisticerror');    
            
        }
        //nel caso in cui non ho match mi va in null pointer exception, è da gestire 
        return view('mytraining.historystatistic')->with('result', $tosend);
    }
    
    
        public function historystatistic() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $tosend = array();
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $history = $user->allhistory;
        //nel caso in cui non ho match mi va in null pointer exception, è da gestire 
        return view('mytraining.historystatistic')->with('result', $history);
    }
    

    public function executetraining($id) {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $tp = $dl->findCompleteTrainingProgramById($id);
        $test = "TEST";

        return view('mytraining.execute')->with('trainingprogram', $tp)
                ->with('test', $test);
    }

    public function postexecute(Request $request, $id) {

//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $tp = $dl->findCompleteTrainingProgramById($id);
        $exerciseList = $tp->exercises;
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $esercises = array();
        foreach ($exerciseList as $ex) {
            if ($request->input('executedReps' . $ex->id) != null && $request->input('executedSets' . $ex->id) != null) {
                if ($request->input('executionDate') == '') {
                    $date = date("Y-m-d");
                } else {
                    $date = $_POST['executionDate'];
                }
                if ($request->input('executedNotes' . $ex->id) == null) {
                    $note = '';
                } else {
                    $note = $request->input('executedNotes' . $ex->id);
                }
                $e = array(
                                'exercise_name'   => $ex->name,
                                'reps'            => $request->input('executedReps' . $ex->id),
                                'reps_min'        => $ex->repsMin,
                                'reps_max'        => $ex->repsMax,
                                'set_min'         => $ex->setMin,
                                'set_max'         => $ex->setMax,
                                'sets'            => $request->input('executedSets' . $ex->id),
                                'note'            => $note,
                                'title_training'  => $request->input('traning_title')
                );
                //$dl->createUserTrainingProgramExecution($ex->id, $id, $user->id, $request->input('executedReps' . $ex->id), $request->input('executedSets' . $ex->id), $date, $note);
                //$e = json_encode($e);
                array_push($esercises, $e);
                }
        }
        $dl->createUserTrainingProgramExecutionJson($esercises,$user->id,$date);
        return view('mytraining.programlist')->with('user', $user);
    }

    public function removemytraining($id) {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $user = $dl->getUserbyUsername(Auth::user()->name);
        $userId = $dl->getUserID(Auth::user()->name);

        $dl->deleteTrainingProgramToUser($userId, $id);


        return view('mytraining.programlist')->with('user', $user);
    }

}
