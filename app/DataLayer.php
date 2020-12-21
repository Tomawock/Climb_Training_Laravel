<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class DataLayer {
    /**
     * Search a user by his id
     * 
     * @param int $username hat need to be search inside the DB
     * @return int id 
     */
    public function getUserID($username) {
        $users = User::where('name', $username)->get(['id']);
        return $users[0]->id;
    }
    /**
     * Search a user by his username
     * 
     * @param string $username that need to be search inside the DB
     * @return User
     */
    public function getUserbyUsername($username) {
        $user = User::where('name', $username)->first();
        return $user;
        
    }
    /**
     * Get all the id of users defined as Admin
     * 
     * @return array
     */
    public function getAllAdmins(){
        $admins = User::where('is_admin', TRUE)->get('id');       
        $toSync=array();
        foreach ($admins as $ad){
            $toSync[]=$ad->id;
        }  
        return $toSync;   
    }
    /**
    * Get all the exercise from the admin user
    *
    * @return list of all Exercises
    */
    public function listExercisesAdmins() {
        $admins= $this->getAllAdmins(); 
        $exerciseList = Exercise::whereIn('id_user',$admins)->get();
        return $exerciseList;
    }
    /**
     * Get all the exercise from the input userid
     * 
     * @param int $user id of the user
     * @return list of all Exercises that matches constraints
     */
    public function listExercisesUserById($user) {
        $exerciseList = Exercise::where('id_user',$user)->get();
        return $exerciseList;
    }
    /**
     * Find the exercise based on his Id
     * 
     * @param int $id related to the exercise
     * @return Eloquent exercise object
     */
    public function findCompleteExerciseById($id) {
        return Exercise::find($id);
    }
    /**
     * Get all the tools defined inside the DB
     * 
     * @return array of Eloquent Tool
     */
    public function getAllTools() {       
        return Tool::all();
    }
    /**
     * Edit all the attributes based on the id of the exercise
     * 
     * @param type $id
     * @param type $name
     * @param type $description
     * @param type $importantNotes
     * @param type $repsMin
     * @param type $repsMax
     * @param type $setMin
     * @param type $setMax
     * @param type $restMin
     * @param type $restMax
     * @param type $overweightMin
     * @param type $overweightMax
     * @param type $overweightUnit
     * @param type $actualuserId
     */
    public function editExercise($id, $name, $description, $importantNotes, $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit,$actualuserId) {
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
        $exercise->id_user=$actualuserId;
        
        $exercise->save();
    }
    /**
     * Create a new exercise passing all the attributes
     * 
     * @param type $name
     * @param type $description
     * @param type $importantNotes
     * @param type $repsMin
     * @param type $repsMax
     * @param type $setMin
     * @param type $setMax
     * @param type $restMin
     * @param type $restMax
     * @param type $overweightMin
     * @param type $overweightMax
     * @param type $overweightUnit
     * @param type $actualuserId
     */
    public function createExercise($name, $description, $importantNotes, $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit,$actualuserId) {
        
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
        $exercise->id_user=$actualuserId;
        
        $exercise->save();
    }
    /**
     * Copy an exercise to a specif user
     * 
     * @param type $exerciseid id of the exercise to copy
     * @param type $actualuserId id of the user to be assigned the new copied exercise
     * 
     */
    public function copyExerciseToUser($exerciseid,$actualuserId) {
        
        $exercise_old = Exercise::find($exerciseid);
        $exercise=new Exercise;
        
        $exercise->name = $exercise_old->name;
        $exercise->description = $exercise_old->description;
        $exercise->importantNotes = $exercise_old->importantNotes;
        $exercise->repsMin = $exercise_old->repsMin;
        $exercise->repsMax = $exercise_old->repsMax;
        $exercise->setMin = $exercise_old->setMin;
        $exercise->setMax = $exercise_old->setMax;
        $exercise->restMin = $exercise_old->restMin;
        $exercise->restMax = $exercise_old->restMax;
        $exercise->overweightMin = $exercise_old->overweightMin;
        $exercise->overweightMax = $exercise_old->overweightMax;
        $exercise->overweightUnit = $exercise_old->overweightUnit;
        $exercise->id_user = $actualuserId;
        
        $exercise->save();
    }
    /**
     * Delete exercise based on his Id
     * 
     * @param int $id of the exercise
     */
    public function deleteExercise($id) {
        Exercise::find($id)->delete();
    }
    /**
     * Get the last exercise added by the user
     * 
     * @param int $actualuserId of the user 
     * @return int the id of the last added exercise
     */
    public function getLastIdExercise($actualuserId) {
        $exe=Exercise::where('id_user',$actualuserId)->orderBy('id','desc')->take(1)->get('id');
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

