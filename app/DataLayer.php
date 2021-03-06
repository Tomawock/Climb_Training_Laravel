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
    
    
    public function getUserbyId($id) {
        $user = User::where('id', $id)->first();
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
        $admins = NULL;
        $exerciseList = Exercise::where('id_user',$admins)->get();
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
     * Get all the users
     * 
     * @return array
     */
    public function getAllUsers(){
        $users = User::orderBy('id','desc')->get();       
        return $users;   
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
    public function createExerciseAdmin($name, $description, $importantNotes, $repsMin, $repsMax, $setMin, $setMax, $restMin, $restMax, $overweightMin, $overweightMax, $overweightUnit) {
        
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
        $exercise->id_user= NULL;
        
        $exercise->save();
    }
    
    
    /**
     * Copy an exercise to a specific user
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
    
    
    /**
     * Delete history based on his Id
     * 
     * @param int $id of the history
     */
    public function deleteHistory($id) {
        History::find($id)->delete();
    }
    
    public function findHistoryById($id) {
        return History::where('id',$id)->get();
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
    /**
     * Delete a specific Photo
     * 
     * @param int $idPhoto Photo id
     */
    public function deletePhoto($idPhoto) {
        Storage::delete( Photo::find($idPhoto)->path);

        Photo::find($idPhoto)->delete();
    }
    /**
     * Delete all Photo related to a specific exercise
     * 
     * @param int $idExercise Exercise id
     */
    public function deleteExerciseToPhotoRecursive($idExercise) {
        
        $exercisePhotos= Exercise::find($idExercise)->photos;
        
        foreach($exercisePhotos as $photo){
            Storage::delete( $photo->path);
            $photo->delete();
        }
    }
    /**
     * Create a Photo to an exercise with a description
     * 
     * @param string $path to the photo
     * @param string $description of the photo to add
     * @param int $idExercise 
     */
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
    /**
     * Find a Photo from a specific Id
     * 
     * @param int $id of the Photo
     * @return EloquentObject Photo
     */
    public function findPhotoByExerciseId($id) {
        
        return Exercise::find($id)->photos;
    }
    /**
     * Copy a Training Program to a specific user
     * 
     * @param int $trainingProgramId id of the Training Program to copy
     * @param int $actualuserId id of the user to be assigned the new copied Training Program
     * 
     */
    public function copyTrainingProgramToUser($trainingProgramId, $actualuserId) {
        
        $tp_old = TrainingProgram::find($trainingProgramId); 
        
        $tp = new TrainingProgram;
        $tp->title=$tp_old->title;
        $tp->description=$tp_old->description;
        $tp->timeMin=$tp_old->timeMin;
        $tp->timeMax=$tp_old->timeMax;
        $tp->id_user = $actualuserId;
        
        $tp->save();
        $exercise=$tp_old->exercises()->get();
        //Creazione copia esercizio e creazione legame con Training program
        foreach ($exercise as $exe){
            $this->copyExerciseToUser($exe->id, $actualuserId);
            $exeNewId =  $this->getLastIdExercise($actualuserId);
            $this->createExerciseToTrainingprogram($exeNewId, $tp->id);
        }        
    }
    /**
     * Get all the Training Program with user admin
     * 
     * @return array of Training Program
     */
    public function listTrainingProgramAdmins() {
        
        $admins= $this->getAllAdmins(); 
        $trainingProgramList = TrainingProgram::whereIn('id_user',$admins)->get();
        return $trainingProgramList;
    }
    /**
     * Get all the Training Program with user passed to the function
     * 
     * @param int $userid id of the User
     * @return array of Training Program
     */
    public function listTrainingProgramUserById($userid) {
        $tpList = TrainingProgram::where('id_user',$userid)->get();
       return $tpList;
    }
    #public function listTrainingProgramUserById($userid) {
    #    $tpList = History::where('id_user',$userid)->get();
    #    return $tpList;
    #}
    /**
     * @deprecated since version 1.0.2
     * 
     * @param type $trainingprogramID
     * @param type $usernameId
     */
    public function addTrainingprogramToUser($trainingprogramID, $usernameId) {
        User::where('id',$usernameId)->first()->trainingprograms()->attach($trainingprogramID);
    }
    /**
     * Find the Training Program with passed id
     * 
     * @param int $tpId Id of the Teraining Program thats need to be search
     * @return EloquentObject TrainingProgram
     */
    public function findCompleteTrainingProgramById($tpId) {
        return TrainingProgram::find($tpId);
    }
    /**
     * Edit a specific TP given his attributes
     * 
     * @param type $id
     * @param type $title
     * @param type $description
     * @param type $timeMin
     * @param type $timeMax
     * @param type $actualuserId
     */
    public function editTrainingProgram($id, $title, $description, $timeMin, $timeMax,$actualuserId) {
        $tp = TrainingProgram::find($id); 
        
        $tp->title=$title;
        $tp->description=$description;
        $tp->timeMin=$timeMin;
        $tp->timeMax=$timeMax;
        $tp->id_user=$actualuserId;
        
        $tp->save();
    }
    /**
     * Create a new TP given his attributes
     * 
     * @param type $title
     * @param type $description
     * @param type $timeMin
     * @param type $timeMax
     * @param type $actualuserId
     */
    public function createTrainingProgram($title, $description, $timeMin, $timeMax,$actualuserId) {
        $tp = new TrainingProgram();
        
        $tp->title=$title;
        $tp->description=$description;
        $tp->timeMin=$timeMin;
        $tp->timeMax=$timeMax;
        $tp->id_user=$actualuserId;
        
        $tp->save();
    }
    /**
     * Create the relation between Training Program and Exercise
     * 
     * @param int $idExercise Id of the Exercise
     * @param int $idTp Id of the Training Program
     */
    public function createExerciseToTrainingprogram($idExercise, $idTp) {
       Exercise::find($idExercise)->trainingprograms()->attach($idTp); 
    }
    /**
     * Delete the relation between Training Program and Exercise
     * 
     * @param int $idExercise Id of the Exercise
     * @param int $idTp Id of the Training Program
     */
    public function deleteExerciseToTrainingprogram($idExercise, $idTp) {
        $toSync=array();
        
        foreach (Exercise::find($idExercise)->trainingprograms as $tpSelected){
            
            if ($tpSelected->id != $idTp){
                $toSync[]=$tpSelected->id;
            }
        }
        
        Exercise::find($idExercise)->trainingprograms()->sync($toSync);
    }
    /**
     * Get the last Training Program added by the user
     * 
     * @param int $actualuserId of the user 
     * @return int the id of the last added Training Program 
     */
    public function getLastIdTrainingprogram($actualuserId) {
        $tp= TrainingProgram::where('id_user',$actualuserId)->orderBy('id','desc')->take(1)->get('id');
        return $tp[0]->id;
    }
    /**
     * Delete the Training Program from the db based on Id
     * 
     * @param int $tpId Id of the training program
     */
    public function deleteTrainingProgram($tpId) {
        TrainingProgram::find($tpId)->delete();
    }


    /**
     * Insert a record of History
     * 
     * @param type $Ex a preformatted exercises inside the traning in json form
     * @param type $id the user id
     * @param type $data the data of execution
     */
    public function createUserTrainingProgramExecutionJson($Ex, $id,$data,$title) {
        
        $tp = new History(); 
        $js = array(
            'exercises' => $Ex,
            'traning_title'=> $title,
        );
        $js = json_encode($js);
        $tp->date=$data;
        $tp->json=$js;
        $tp->id_user=$id;
        $tp->save();      
    }

    /**
     * Get if a exercise is preset inside a many to many relation with TP, 
     * and if is true he should not be delated
     * 
     * @param type $idEx id of exercise to control
     * @return boolean true: is present ~~ false: is NOT present
     */
    public function isIdExerciseBlocked($idEx){
        
        $temp2 = DB::select("SELECT * FROM `trainingprogram_to_exercise` WHERE `id_exercise` = :id", ['id' => $idEx   ]);
        if (count($temp2)>0){
            return true;
        }else {
            return false;
        }
    }
    
    public function deleteAllHistoryUser($id) {
        History::where('id_user',$id)->delete();
    }
    
    
    public function deleteAllTPUser($id) {
        $tps = TrainingProgram::where('id_user',$id)->get();
        foreach($tps as $tp){
            TrainingprogramToExercise::where('id_trainingProgram',$tp->id)->delete();
        }
        TrainingProgram::where('id_user',$id)->delete();
    }
    
    public function deleteAllExercisesUser($id) {
        Exercise::where('id_user',$id)->delete();
    }
    
    public function deleteUser($id) {
        User::where('id',$id)->delete();
    }
}
?>

