<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\Exercise;
use App\Photo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExerciseController extends Controller
{
    public function index() {
        //object that has all the function to managhe the db and the access of his information
        $dl = new DataLayer();
        $actualuserId= Auth::user()->id;
        $exerciseListAdmins = $dl->listExercisesAdmins();
        $exerciseListUser = $dl->listExercisesUserById($actualuserId);
        
        //disabilita la cancellazione
        $bloked=array();    
        foreach ($exerciseListUser as $es){
            if ($dl->isIdExerciseBlocked($es->id)){
                $bloked[]=$es->id;
            }
        }
        
        return view('exercise.list')->with('exerciseList',$exerciseListAdmins)
                ->with('bloked',$bloked)->with('userExercise',$exerciseListUser)
                ->with('user',Auth::user());
    }
    
    public function create() {        
        $dl = new DataLayer();

        $allTools=$dl->getAllTools();
        
        return view('exercise.edit')->with('units',['Kg','%'])->with('tools',$allTools);
    }
    
    public function store(Request $request) {
        
        //validation ceck
        if ($request->hasFile('exercisePhoto')) {    
            $this->validate($request, array_merge(Photo::$rules,Exercise::rules($request)));
        
        }else {
            $this->validate($request, Exercise::rules($request));
        }
        
        $dl = new DataLayer();
        $actualuserId= Auth::user()->id;
        
        $dl->createExercise($request->input('exerciseName'), $request->input('exerciseDescription'),$request->input('exerciseImportantNotes'),
                $request->input('exerciseRepsMin'),$request->input('exerciseRepsMax'),$request->input('exerciseSetMin'),
                $request->input('exerciseSetMax'),$request->input('exerciseRestMin'),$request->input('exerciseRestMax'),
                $request->input('exerciseOverweightMin'),$request->input('exerciseOverweightMax'),$request->input('exerciseOverweightUnit'),
                $actualuserId);
        
        $id=$dl->getLastIdExercise($actualuserId);
       
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
        //manage feedback after correctly creating
        Session::flash('success',trans('label.feedbackExerciseCorrectlyCreated',
                [ 'name'=>Exercise::find($dl->getLastIdExercise($actualuserId))->name]));
        
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
        
        return view('exercise.show')->with('exercise', $exercise)->with('toolsString',$toolsString);
    }
    
    public function edit($id) {        
        $dl = new DataLayer();
        
        $exercise = $dl->findCompleteExerciseById($id);
        $allTools=$dl->getAllTools();
        
        
        return view('exercise.edit')->with('exercise', $exercise)->with('units',['Kg','%'])->with('tools',$allTools);   
    }
    
    public function postupdate(Request $request, $id){
        
        if ($request->hasFile('exercisePhoto')) {    
            $this->validate($request, array_merge(Photo::$rules,Exercise::rules($request)));
        
        }else {
            $this->validate($request, Exercise::rules($request));
        }
        
        $dl = new DataLayer();
        $actualuserId= Auth::user()->id;
        $dl->editExercise($id, $request->input('exerciseName'), $request->input('exerciseDescription'),$request->input('exerciseImportantNotes'),
                $request->input('exerciseRepsMin'),$request->input('exerciseRepsMax'),$request->input('exerciseSetMin'),
                $request->input('exerciseSetMax'),$request->input('exerciseRestMin'),$request->input('exerciseRestMax'),
                $request->input('exerciseOverweightMin'),$request->input('exerciseOverweightMax'),$request->input('exerciseOverweightUnit'),
                $actualuserId);
        
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
        
        //manage feedback 
        Session::flash('success',trans('label.feedbackExerciseCorrectlyEdited',
                 [ 'name'=>Exercise::find($id)->name]));
        
        return Redirect::to(route('exercise.index'));
    }
    
    public function update(Request $request, $id) {//DONE
        //non sarebbe visitabile ma per evitare problemi con le routes, faccio solo un reinderizzamento
        return Redirect::to(route('exercise.index'));      
    }
    
    public function destroy ($id) {
        $dl = new DataLayer();
        //prmi elimino le foto legate all'esercizio e le righe dell atabella di legame con tools
        
        $tools = Exercise::find($id)->tools;
        //set up dependecies of exercise
        foreach ( $tools as $actualTool) {   
            $dl->deleteExerciseToToll($id, $actualTool->id);  
        }
        
        $dl->deleteExerciseToPhotoRecursive($id);
        $name=Exercise::find($id)->name;
        $dl->deleteExercise($id);
        
        //manage feedback 
        Session::flash('success',trans('label.feedbackExerciseCorrectlyDestroyed',
                [ 'name'=>$name]));
       
        return Redirect::to(route('exercise.index'));
    }
    
    public function confirmDestroy($id) {
        
        $dl = new DataLayer();
        
        $exercise=$dl->findCompleteExerciseById($id);
        
        return view('exercise.destroy')->with('exercise', $exercise); 
    }
    /**
     * Allows to copy one exercise to a user
     * 
     * @param int $id of the exercise to copy 
     * @return rote Exercise indexs
     */
    public function copyExercise($id) {

        $dl = new DataLayer();
        $actualuserId= Auth::user()->id;
        $dl->copyExerciseToUser($id, $actualuserId);
        
        //manage feedback 
        Session::flash('success',trans('label.feedbackExerciseCorrectlyCopied',
                [ 'name'=>Exercise::find($dl->getLastIdExercise($actualuserId))->name]));
        
        return Redirect::to(route('exercise.index'));
    }
}
