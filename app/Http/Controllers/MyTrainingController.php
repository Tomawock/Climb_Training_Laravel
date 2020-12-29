<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MyTrainingController extends Controller {

    public function information() {
        $dl = new DataLayer();

        $user = $dl->getUserbyUsername(Auth::user()->name);
        $exercises = $dl->listExercisesUserById($user->id);

        return view('mytraining.information')->with('user', $user)->with('exercises', $exercises);
    }

    public function programlist() {
        $dl = new DataLayer();

        $user = $dl->getUserbyUsername(Auth::user()->name);


        return view('mytraining.programlist')->with('user', $user);
    }

    public function historystatistic() {
        $dl = new DataLayer();
        $tosend = array();
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $history = $user->allhistory;
        //nel caso in cui non ho match mi va in null pointer exception, è da gestire 
        return view('mytraining.historystatistic')->with('result', $history);
    }

    public function executetraining($id) {
        $dl = new DataLayer();
        $tp = $dl->findCompleteTrainingProgramById($id);
        $test = "TEST";

        return view('mytraining.execute')->with('trainingprogram', $tp)
                        ->with('test', $test);
    }

    public function destroy($id) {
        $dl = new DataLayer();
        $hs = History::find($id);
        return view('mytraining.distorytraning')->with('history', $hs);
    }

    public function postexecute(Request $request, $id) {
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
                    'exercise_name' => $ex->name,
                    'reps' => $request->input('executedReps' . $ex->id),
                    'reps_min' => $ex->repsMin,
                    'reps_max' => $ex->repsMax,
                    'set_min' => $ex->setMin,
                    'set_max' => $ex->setMax,
                    'sets' => $request->input('executedSets' . $ex->id),
                    'note' => $note
                );
                array_push($esercises, $e);
            }
        }
        $dl->createUserTrainingProgramExecutionJson($esercises, $user->id, $date, $request->input('traning_title'));
        //feedback
        Session::flash('success', trans('label.feedbackTrainingProgramCorrectlyExecuted',
                        ['title' => $tp->title]));
        return view('mytraining.programlist')->with('user', $user);
    }

    public function destroyconfirm($id) {
        $dl = new DataLayer();
        $dl->deleteHistory($id);
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $history = $user->allhistory;
        //nel caso in cui non ho match mi va in null pointer exception, è da gestire 
        return view('mytraining.historystatistic')->with('result', $history);
    }

    public function deletemyself() {
        $dl = new DataLayer();
        $user = $dl->getUserbyUsername(Auth::user()->name);
        return view('mytraining.deleteuser')->with('user', $user);
    }

    public function deletemyselfconfirm() {

        $dl = new DataLayer();
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $id = $user->id;
        $dl->deleteAllHistoryUser($id);
        $dl->deleteAllTPUser($id);
        $dl->deleteAllExercisesUser($id);
        $dl->deleteUser($id);
        return redirect()->route('administrator.userslist');
        $dl = new DataLayer();

        return redirect('home');
    }

}
