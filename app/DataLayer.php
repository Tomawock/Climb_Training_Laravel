<?php

namespace App;
use Illuminate\Support\Facades\Storage;


class DataLayer {

    public function validUser($username, $password) {
        $users = Myuser::where('username', $username)->get(['password']);

        if (count($users) == 0) {
            return false;
        }

        return (md5($password) == ($users[0]->password));
    }

    public function addUser($name, $surname, $username, $password, $email) {
        $user = new Myuser;

        $user->name = $name;
        $user->surname = $surname;
        $user->username = $username;
        $user->password = md5($password);
        $user->email = $email;
        $user->save();
    }

    public function getUserID($username) {
        $users = Myuser::where('username', $username)->get(['id']);
        return $users[0]->id;
    }

    public function getUserbyUsername($username) {
        $user = Myuser::where('username', $username)->first();
        return $user;
        
    }

    public function listExercises() {
        $exerciseList = Exercise::all()->sortBy('name');
        return $exerciseList;
    }

    public function findCompleteExerciseById($id) {

        return Exercise::find($id);
    }

    public function getAllTools() {       
        return Tool::all();
    }

    public function editExercise($id, $name, $description, $importantNotes, $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit) {
        $exercise = Exercise::find($id); 
        
        $exercise->name = $name;
        $exercise->description = $description;
        $exercise->importantNotes = $importantNotes;
        $exercise->repsMin = $repsMin;
        $exercise->repsMax = $repsMax;
        $exercise->setMin = $setMin;
        $exercise->setMax = $setMax;
        $exercise->restMin = $restMin;
        $exercise->restMax = $restMax;
        $exercise->overweightMin = $overweightMin;
        $exercise->overweightMax = $overweightMax;
        $exercise->overweightUnit = $overweightUnit;
        
        $exercise->save();
    }

    public function createExercise($name, $description, $importantNotes, $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit) {
        
        $exercise=new Exercise;
        
        $exercise->name = $name;
        $exercise->description = $description;
        $exercise->importantNotes = $importantNotes;
        $exercise->repsMin = $repsMin;
        $exercise->repsMax = $repsMax;
        $exercise->setMin = $setMin;
        $exercise->setMax = $setMax;
        $exercise->restMin = $restMin;
        $exercise->restMax = $restMax;
        $exercise->overweightMin = $overweightMin;
        $exercise->overweightMax = $overweightMax;
        $exercise->overweightUnit = $overweightUnit;
        
        $exercise->save();
    }

    public function deleteExercise($id) {
        Exercise::find($id)->delete();
    }

    public function getLastIdExercise() {
        
        $exe=Exercise::orderBy('id','desc')->take(1)->get('id');
        return $exe[0]->id;
    }

    public function createExerciseToToll($idExercise, $idTool) {
        
        Exercise::find($idExercise)->tools()->attach($idTool); 
    }

    public function deleteExerciseToToll($idExercise, $idTool) {
        $toSync=array();
        foreach (Exercise::find($idExercise)->tools as $tollsSelected){
            if ($tollsSelected->id != $idTool)
                $toSync[]=$tollsSelected->id;
        }
        Exercise::find($idExercise)->tools()->sync($toSync);
    }

    public function deletePhoto($idPhoto) {
        Storage::delete( Photo::find($idPhoto)->path);

        Photo::find($idPhoto)->delete();
    }

    public function deleteExerciseToPhotoRecursive($idExercise) {
        
        $exercisePhotos= Exercise::find($idExercise)->photos;
        
        foreach($exercisePhotos as $photo){
            Storage::delete( $photo->path);
            $photo->delete();
        }
    }

    public function createPhoto($path, $description,$idExercise) {
        $ph=new Photo();

        $ph->path=$path;
        $ph->description=$description;
        $ph->id_exercise=$idExercise;
        
        $ph->save();
    }

    public function findPhotoByExerciseId($id) {
        
        return Exercise::find($id)->photos;
    }

    public function listTrainingProgram() {
        return TrainingProgram::all()->sortBy('title');
    }

    public function addTrainingprogramToUser($trainingprogramID, $usernameId) {
        Myuser::find($usernameId)->trainingprograms()->attach($trainingprogramID);
    }

    public function findCompleteTrainingProgramById($tpId) {

        return TrainingProgram::find($tpId);
    }

    public function editTrainingProgram($id, $title, $description, $timeMin, $timeMax) {
        $tp = TrainingProgram::find($id); 
        
        $tp->title=$title;
        $tp->description=$description;
        $tp->timeMin=$timeMin;
        $tp->timeMax=$timeMax;
        
        $tp->save();
    }

    public function createTrainingProgram($title, $description, $timeMin, $timeMax) {
        $tp = new TrainingProgram();
        
        $tp->title=$title;
        $tp->description=$description;
        $tp->timeMin=$timeMin;
        $tp->timeMax=$timeMax;
        
        $tp->save();
    }

    public function createExerciseToTrainingprogram($idExercise, $idTp) {
       Exercise::find($idExercise)->trainingprograms()->attach($idTp); 
    }

    public function deleteExerciseToTrainingprogram($idExercise, $idTp) {
        $toSync=array();
        
        foreach (Exercise::find($idExercise)->trainingprograms as $tpSelected){
            
            if ($tpSelected->id != $idTp){
                $toSync[]=$tpSelected->id;
            }
        }
        
        Exercise::find($idExercise)->trainingprograms()->sync($toSync);
    }

    public function getLastIdTrainingprogram() {
        $tp= TrainingProgram::orderBy('id','desc')->take(1)->get('id');
        return $tp[0]->id;
    }

    public function deleteTrainingProgramToAllUser($tpId) {
        
        TrainingProgram::find($tpId)->users()->sync([]);
         
    }

    public function deleteTrainingProgram($tpId) {
        TrainingProgram::find($tpId)->delete();
    }

    public function deleteTrainingProgramToUser($userId, $tpId) {
        
        $toSync=array();
        foreach (Myuser::find($userId)->trainingprograms as $tp){
            if ($tp->id != $tpId)
                $toSync[]=$tp->id;
        }
        Myuser::find($userId)->trainingprograms()->sync($toSync);
    }

    public function createUserTrainingProgramExecution($idEx, $idTp, $idUsr, $reps, $sets, $date, $note) {
        //per le tabell di legame con dati multipli fai come:: $user->roles()->attach($roleId, ['expires' => $expires]);
        Myuser::find($idUsr)->executedtrainingprograms()->attach($idTp,['id_exercise' =>$idEx,'reps' =>$reps,'sets'=>$sets,'date'=>$date,'note'=>$note]); 
    }

    public function getUserTrainingProgramExecutionByUserId($idUsr) {
        
        return Myuser::find($idUsr)->executedtrainingprograms;
    }

    public function getUserTrainingProgramExecutionByUserIdDateAndTrainingProgram($idUsr, $date, $trainingProgram) {
        $result=array();
        $temp = Myuser::find($idUsr)->executedtrainingprograms;
        foreach($temp as $t){
            if($t->pivot->date==$date && $t->id==$trainingProgram){
                $result['exercise'][]=$this->findCompleteExerciseById($t->pivot->id_exercise);
                $result['execution'][]=$t->pivot;
            }
        }
        return $result;
    }
}
?>

