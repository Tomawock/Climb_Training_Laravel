<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function loadDatatableLanguage() {
        //for some reason if i put lang as imprt it dont work 
        //find the actual language used by the system
        $lang = \Illuminate\Support\Facades\Lang::getLocale();
        //load the corect json file with the language 
        $path="/../../../resources/lang/".$lang."/datatable_".$lang.".json";
        $string = file_get_contents(__DIR__ .$path);
        $json_a = json_decode($string, true);
        
        return response()->json($json_a);
    }
    

}
