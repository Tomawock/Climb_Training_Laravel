<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\Myuser;
use Illuminate\Support\Facades\Redirect;

class MyTrainingController extends Controller {

    public function information() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $user = $dl->getUserbyUsername($_SESSION['loggedName']);

        return view('mytraining.information')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('user', $user);
    }

    public function programlist() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $user = $dl->getUserbyUsername($_SESSION['loggedName']);


        return view('mytraining.programlist')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('user', $user);
    }

    public function historystatistic() {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $tosend = array();
        $userId = $dl->getUserID($_SESSION['loggedName']);
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
            return view('mytraining.historystatisticerror')->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
        }
        //nel caso in cui non ho match mi va in null pointer exception, è da gestire 
        return view('mytraining.historystatistic')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('result', $tosend);
    }

    public function executetraining($id) {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();
        $tp = $dl->findCompleteTrainingProgramById($id);

        return view('mytraining.execute')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('trainingprogram', $tp);
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
        $user = $dl->getUserbyUsername($_SESSION['loggedName']);
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

                $dl->createUserTrainingProgramExecution($ex->id, $id, $user->id, $request->input('executedReps' . $ex->id), $request->input('executedSets' . $ex->id), $date, $note);
            }
        }

        return view('mytraining.programlist')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('user', $user);
    }

    public function removemytraining($id) {
//        session_start();
//
//        if (!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }

        $dl = new DataLayer();

        $user = $dl->getUserbyUsername($_SESSION['loggedName']);
        $userId = $dl->getUserID($_SESSION['loggedName']);

        $dl->deleteTrainingProgramToUser($userId, $id);


        return view('mytraining.programlist')->with('logged', true)->with('loggedName', $_SESSION["loggedName"])
                        ->with('user', $user);
    }

}
