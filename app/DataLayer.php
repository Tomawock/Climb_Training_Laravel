<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class DataLayer {

    public function getUserID($username) {
        $users = User::where('name', $username)->get(['id']);
        return $users[0]->id;
    }

    public function getUserbyUsername($username) {
        $user = User::where('name', $username)->first();
        return $user;
        
    }
    /**
     * Get all user defined as ADMINS
     *
     * @return list of id who are defined as Admins
     */
    public function getAllAdmins(){
        $admins = User::where('is_admin', TRUE)->get(['id']);
        return $admins;
        
    }
    /**
    * Get all the exercise from actual user or admin user
    * TODO
    *
    * @return list of all Exercises
    */
    public function listExercises() {
        //modificare
        $exerciseList = Exercise::all()->sortBy('name');
        return $exerciseList;
    }

    public function findCompleteExerciseById($id) {
        return Exercise::find($id);
    }

    public function getAllTools() {       
        return Tool::all();
    }

    //modificare
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
    //modificare
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
        //modificare
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
    public function createTool($name){
        $tool=new Tool();
        $tool->name=$name;
        $tool->save();
    }

    public function findPhotoByExerciseId($id) {
        
        return Exercise::find($id)->photos;
    }

    public function listTrainingProgram() {
        return TrainingProgram::all()->sortBy('title');
    }
    //modded
    public function addTrainingprogramToUser($trainingprogramID, $usernameId) {
        User::where('id',$usernameId)->first()->trainingprograms()->attach($trainingprogramID);
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
        foreach (User::where('id',$userId)->first()->trainingprograms as $tp){
            if ($tp->id != $tpId){
                $toSync[]=$tp->id;
            }
        }
        User::where('id',$userId)->first()->trainingprograms()->sync($toSync);
    }

    public function createUserTrainingProgramExecution($idEx, $idTp, $idUsr, $reps, $sets, $date, $note) {
        //per le tabell di legame con dati multipli fai come:: $user->roles()->attach($roleId, ['expires' => $expires]);
        User::where('id',$idUsr)->first()->executedtrainingprograms()->attach($idTp,['id_exercise' =>$idEx,'reps' =>$reps,'sets'=>$sets,'date'=>$date,'note'=>$note]); 
    }

    public function getUserTrainingProgramExecutionByUserId($idUsr) {
        
        return User::where('id',$idUsr)->first()->executedtrainingprograms;
    }

    public function getUserTrainingProgramExecutionByUserIdDateAndTrainingProgram($idUsr, $date, $trainingProgram) {
        $result=array();
        $temp = User::where('id',$idUsr)->first()->executedtrainingprograms;
        foreach($temp as $t){
            if($t->pivot->date==$date && $t->id==$trainingProgram){
                $result['exercise'][]=$this->findCompleteExerciseById($t->pivot->id_exercise);
                $result['execution'][]=$t->pivot;
            }
        }
        return $result;
    }
    
    public function isIdExerciseBlocked($idEx){
        $temp = DB::select("SELECT * FROM `user_trainingprogram_execution` WHERE `id_exercise` = :id", ['id' => $idEx   ]);
        $temp2 = DB::select("SELECT * FROM `trainingprogram_to_exercise` WHERE `id_exercise` = :id", ['id' => $idEx   ]);
        if (count($temp)>0 || count($temp2)>0){
            return true;
        }else {
            return false;
        }
    }
    
    public function isIdTrainingprogramBlocked($idTp){
        $temp = DB::select("SELECT * FROM `user_trainingprogram_execution` WHERE `id_trainingProgram` = :id", ['id' => $idTp   ]);
        if (count($temp)>0){
            return true;
        }else {
            return false;
        }
    }
}
?>

