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

    public function searchExerciseByName($name) {
        $connection = $this->db_connect();

        $sql = "SELECT * FROM exercise WHERE LOWER(`name`) LIKE LOWER('%" . $name . "%') ORDER BY name";

        $risposta = mysqli_query($connection, $sql) or
                die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);

        $exerciseList = array();
        while ($riga = mysqli_fetch_array($risposta)) {
            $exerciseList[] = new Exercise($riga['id'], $riga['name'], $riga['description']);
        }

        $all = $this->listExercisesSimple();
        //rimuovo le copie nella query generale
        foreach ($exerciseList as $searchedElem) {
            foreach ($all as $index => $generalElem) {
                if ($searchedElem->getId() == $generalElem->getId()) {
                    unset($all[$index]);
                }
            }
        }

        $result = array_merge($exerciseList, $all);

        return $result;
    }

    public function listExercises() {
        $exerciseList = Exercise::all()->sortBy('name');
        return $exerciseList;
    }

    public function findCompleteExerciseById($id) {

        return Exercise::find($id);
    }

    public function findToolByExerciseId($id) {
        $connection = $this->db_connect();
        $sql = "SELECT * FROM exercise_to_tools where id_exercise='" . $id . "'";
        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());
        mysqli_close($connection);

        $exerciseTools = array();
        while ($riga = mysqli_fetch_array($risposta)) {
            $exerciseTools[] = $this->getToolById($riga['id_tool']);
        }

        return $exerciseTools;
    }

    public function getToolById($id) {
        $connection = $this->db_connect();
        $sql = "SELECT * FROM tecnical_tools WHERE id='" . $id . "'";
        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());
        mysqli_close($connection);

        $riga = mysqli_fetch_array($risposta);

        return new Tool($riga['id'], $riga['name']);
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

    public function getLastIdPhoto() {
        $connection = $this->db_connect();
        $sql = "SELECT id FROM `photo` ORDER BY id DESC LIMIT 1";

        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);
        return mysqli_fetch_array($risposta)['id'];
    }

    public function createExerciseToPhoto($idExercise, $idPhoto) {
        $connection = $this->db_connect();
        $sql = "INSERT INTO `exercise_to_photo` (`id`, `id_exercise`, `id_photo`) VALUES (NULL, '" . $idExercise . "', '" . $idPhoto . "')";

        mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);
    }

    public function findPhotoByExerciseId($id) {
        
        return Exercise::find($id)->photos;
    }

    public function getPhotoById($id) {
        $connection = $this->db_connect();
        $sql = "SELECT * FROM photo WHERE id='" . $id . "'";
        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());
        mysqli_close($connection);

        $riga = mysqli_fetch_array($risposta);

        return new Photo($riga['id'], $riga['path'], $riga['description']);
    }

    public function listTrainingProgram() {
        return TrainingProgram::all()->sortBy('title');
    }

    public function addTrainingprogramToUser($trainingprogramID, $usernameId) {
        Myuser::find($usernameId)->trainingprograms()->attach($trainingprogramID);
    }

    public function getMyTrainingprogramsId($username) {
        $userId = $this->getUserID($username);

        $connection = $this->db_connect();
        $sql = "SELECT `trainingprogram_id` FROM `user_trainingprogram` WHERE `user_id`=" . $userId;

        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);

        $myTainningprograms = array();
        while ($riga = mysqli_fetch_array($risposta)) {
            $myTainningprograms[] = $riga['trainingprogram_id'];
        }
        return $myTainningprograms;
    }

    public function getMyTrainingprogramsComplete($username) {
        $userId = $this->getUserID($username);

        $connection = $this->db_connect();
        $sql = "SELECT `trainingprogram_id` FROM `user_trainingprogram` WHERE `user_id`=" . $userId;

        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);

        $myTainningprograms = array();
        while ($riga = mysqli_fetch_array($risposta)) {
            $myTainningprograms[] = $this->findCompleteTrainingProgramById($riga['trainingprogram_id']);
        }
        return $myTainningprograms;
    }

    public function findCompleteTrainingProgramById($tpId) {

        return TrainingProgram::find($tpId);
    }

    public function getExercisesByTrainingprogram($tpId) {

        $connection = $this->db_connect();
        $sql = "SELECT `id_exercise` FROM `trainingprogram_to_exercise` WHERE `id_trainingProgram`=" . $tpId;

        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);

        $exercises = array();
        while ($riga = mysqli_fetch_array($risposta)) {
            $exercises[] = $this->findCompleteExerciseById($riga['id_exercise']);
        }
        return $exercises;
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

    public function addExerciseToTrainingprogram($tpid, $exercises) {
        $sql = "";
        foreach ($exercises as $ex) {
            $sql .= "INSERT INTO `trainingprogram_to_exercise`(`id`, `id_exercise`, `id_trainingProgram`) VALUES"
                    . " (NULL ," . $ex->getId() . "," . $tpid . ");";
        }
        echo $sql;
        $connection = $this->db_connect();
        mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());

        mysqli_close($connection);
    }

    public function isPresentExerciseToTrainingprogram($idExercise, $idTp) {
        $connection = $this->db_connect();
        $sql = "SELECT * FROM `trainingprogram_to_exercise` WHERE `id_exercise`='" . $idExercise . "' AND `id_trainingProgram`='" . $idTp . "'";

        $risposta = mysqli_query($connection, $sql) or die('Errore nella query: ' . $sql . '\n' . mysqli_error());
        $res = 0;
        while ($riga = mysqli_fetch_array($risposta)) {
            $res++;
        }
        mysqli_close($connection);

        if ($res > 0)
            return true;
        else
            return false;
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

