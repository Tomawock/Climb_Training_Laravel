<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataLayer;
use App\Exercise;
use App\Photo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdministratorController extends Controller {

    public function users() {
        $dl = new DataLayer();
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $users_list = $dl->getAllUsers();
        if ($user->is_admin){
            return view('administrator.users')->with('user', $user)->with('users_list', $users_list);
        } else {
            return redirect()->route('home');
        }
      
    }

    public function newexercise() {
        $dl = new DataLayer();
        $user = $dl->getUserbyUsername(Auth::user()->name);
        $allTools=$dl->getAllTools();
        if ($user->is_admin){
            return view('administrator.edit')->with('units',['Kg','%'])->with('tools',$allTools);
        } else {
            return redirect()->route('home');
        }
    }      
    
    
    public function store(Request $request) {
        //validation ceck
        if ($request->hasFile('exercisePhoto')) {    
            $this->validate($request, array_merge(Photo::$rules,Exercise::$rules));
        
        }else {
            $this->validate($request, Exercise::$rules);
        }
        
        $dl = new DataLayer();
        
        $dl->createExerciseAdmin($request->input('exerciseName'), $request->input('exerciseDescription'),$request->input('exerciseImportantNotes'),
                $request->input('exerciseRepsMin'),$request->input('exerciseRepsMax'),$request->input('exerciseSetMin'),
                $request->input('exerciseSetMax'),$request->input('exerciseRestMin'),$request->input('exerciseRestMax'),
                $request->input('exerciseOverweightMin'),$request->input('exerciseOverweightMax'),$request->input('exerciseOverweightUnit'));
        
        $actualuserId = NULL;
        $id=NULL;
       
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
 
}}
 
