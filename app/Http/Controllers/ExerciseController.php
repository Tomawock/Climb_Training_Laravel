<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\Exercise;
use App\Photo;
use Illuminate\Support\Facades\Redirect;

class ExerciseController extends Controller
{
    public function index() {//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();
        
        $exerciseList = $dl->listExercises();
        
        return view('exercise.list')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('exerciseList',$exerciseList);
        
    }
    
    public function create() {//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();

        $allTools=$dl->getAllTools();
        
        return view('exercise.edit')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('units',['Kg','%'])->with('tools',$allTools);
    }
    
    public function store(Request $request) {//DONE     
//       session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        //validation ceck
        if ($request->hasFile('exercisePhoto')) {    
            $this->validate($request, array_merge(Photo::$rules,Exercise::$rules));
        
        }else {
            $this->validate($request, Exercise::$rules);
        }
        
        $dl = new DataLayer();
        $dl->createExercise($request->input('exerciseName'), $request->input('exerciseDescription'),$request->input('exerciseImportantNotes'),
                $request->input('exerciseRepsMin'),$request->input('exerciseRepsMax'),$request->input('exerciseSetMin'),
                $request->input('exerciseSetMax'),$request->input('exerciseRestMin'),$request->input('exerciseRestMax'),
                $request->input('exerciseOverweightMin'),$request->input('exerciseOverweightMax'),$request->input('exerciseOverweightUnit'));
        
        $id=$dl->getLastIdExercise();
       
        //set up dependecies of exercise and tools
        foreach ($dl->getAllTools() as $actualTool) {
            //presente nell selezione della pagina e non preente sul db allora lo aggiungo   
            if ($request->input('tool' . $actualTool->id) !== null) {                
                $dl->createExerciseToToll($id, $actualTool->id);
            }
        }
        
        if ($request->hasFile('exercisePhoto')) {                
            $fileurl = $request->file('exercisePhoto')->storeAs('exercisePhotos',$request->file('exercisePhoto')->getClientOriginalName() );
            $dl->createPhoto($fileurl,$request->input('exercisePhotoDescription'),$id);
        }
        
        return Redirect::to(route('exercise.index'));
    }
    
    public function show($id) {//DONE
//        session_start();
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();
        
        $exercise = $dl->findCompleteExerciseById($id);
        $toolsString='';
        $toolsString.=$exercise->myToolsToString();
        return view('exercise.show')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('exercise', $exercise)->with('toolsString',$toolsString);
    }
    
    public function edit($id) {//DONE     
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();
        
        $exercise = $dl->findCompleteExerciseById($id);
        $allTools=$dl->getAllTools();
        
        
        return view('exercise.edit')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('exercise', $exercise)->with('units',['Kg','%'])->with('tools',$allTools);   
    }
    
    public function postupdate(Request $request, $id){//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        if ($request->hasFile('exercisePhoto')) {    
            $this->validate($request, array_merge(Photo::$rules,Exercise::$rules));
        
        }else {
            $this->validate($request, Exercise::$rules);
        }
        
        $dl = new DataLayer();
        $dl->editExercise($id, $request->input('exerciseName'), $request->input('exerciseDescription'),$request->input('exerciseImportantNotes'),
                $request->input('exerciseRepsMin'),$request->input('exerciseRepsMax'),$request->input('exerciseSetMin'),
                $request->input('exerciseSetMax'),$request->input('exerciseRestMin'),$request->input('exerciseRestMax'),
                $request->input('exerciseOverweightMin'),$request->input('exerciseOverweightMax'),$request->input('exerciseOverweightUnit'));
        
        $exercise=$dl->findCompleteExerciseById($id);
                
        //set up dependecies of exercise and tools
        foreach ($dl->getAllTools() as $actualTool) {
            //presente nell selezione della pagina e non preente sul db allora lo aggiungo   
            if ($request->input('tool' . $actualTool->id) !== null && !$exercise->tools->contains($actualTool->id)==1) {                
                $dl->createExerciseToToll($id, $actualTool->id);
            } else if ($request->input('tool' . $actualTool->id) === null && $exercise->tools->contains($actualTool->id)==1) {
                //non preente nella selezione della pagina ma è preente nel db
                $dl->deleteExerciseToToll($id, $actualTool->id);
            }
        }
        //handle the combobox of selcted images FARE PRIMA QUESTO
        $exercisePhoto = $dl->findPhotoByExerciseId($id);
        foreach ($exercisePhoto as $photoAlreadySelected) {
            //la foto era selezionata ed ora non lo è piu => devo cancellarla
            if ($request->input('photo' . $photoAlreadySelected->id) === null) {
                //elimino la photo
                $dl->deletePhoto($photoAlreadySelected->id);
            }
        }

        if ($request->hasFile('exercisePhoto')) {
            
            $fileurl = $request->file('exercisePhoto')->storeAs('exercisePhotos',$request->file('exercisePhoto')->getClientOriginalName() );
            $dl->createPhoto($fileurl,$request->input('exercisePhotoDescription'),$id);
        }
        
        return Redirect::to(route('exercise.index'));
    }
    
    public function update(Request $request, $id) {//DONE
        //non sarebbe visitabile ma per evitare problemi con le routes, faccio solo un reinderizzamento
        return Redirect::to(route('exercise.index'));
        
    }
    
    public function destroy ($id) {//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        $dl = new DataLayer();
        //prmi elimino le foto legate all'esercizio e le righe dell atabella di legame con tools
        
        $tools = Exercise::find($id)->tools;
        //set up dependecies of exercise
        foreach ( $tools as $actualTool) {   
            $dl->deleteExerciseToToll($id, $actualTool->id);  
        }
        
        $dl->deleteExerciseToPhotoRecursive($id);
        $dl->deleteExercise($id);
       
        return Redirect::to(route('exercise.index'));
    }
    
    public function confirmDestroy($id) {//DONE
//        session_start();
//    
//        if(!isset($_SESSION['logged'])) {
//            return Redirect::to(route('user.login'));
//        }
        
        $dl = new DataLayer();
        
        $exercise=$dl->findCompleteExerciseById($id);
        
        return view('exercise.destroy')->with('logged',true)->with('loggedName', $_SESSION["loggedName"])
                ->with('exercise', $exercise); 
    }
}
