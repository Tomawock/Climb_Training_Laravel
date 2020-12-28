<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::group(['middleware' => ['lang']], function () {

    Auth::routes();

    Route::get('/home', 'FrontController@getHome');

    Route::get('/', ['as' => 'home', 'uses' => 'FrontController@getHome']);
    Route::get('/lang/{lang}', ['as' => 'setLang',
        'uses' => 'LangController@changeLanguage']);
});

Route::group(['middleware' => ['auth', 'lang']], function() {
    Route::resource('exercise', 'ExerciseController');
    Route::post('/exercise/{id}/postupdate', ['as' => 'exercise.postupdate', 'uses' => 'ExerciseController@postupdate']);
    Route::get('/exercise/{id}/destroy', ['as' => 'exercise.destroy', 'uses' => 'ExerciseController@destroy']);
    Route::get('/exercise/{id}/destroy/confirm', ['as' => 'exercise.destroy.confirm', 'uses' => 'ExerciseController@confirmDestroy']);
    Route::get('/exercise/{id}/update', ['as' => 'exercise.update', 'uses' => 'ExerciseController@update']);
    Route::get('/exercise/{id}/copy', ['as' => 'exercise.copy', 'uses' => 'ExerciseController@copyExercise']);

    Route::resource('trainingprogram', 'TrainingProgramController');
    Route::get('/trainingprogram/{id}/copy', ['as' => 'trainingprogram.copy', 'uses' => 'TrainingProgramController@copyTrainingProgram']);
    Route::get('/trainingprogram/{id}/addmytraining', ['as' => 'trainingprogram.addmytraining', 'uses' => 'TrainingProgramController@addmytraining']);
    Route::get('/trainingprogram/{id}/destroy', ['as' => 'trainingprogram.destroy', 'uses' => 'TrainingProgramController@destroy']);
    Route::get('/trainingprogram/{id}/destroy/confirm', ['as' => 'trainingprogram.destroy.confirm', 'uses' => 'TrainingProgramController@confirmDestroy']);
    Route::get('/trainingprogram/{id}/update', ['as' => 'trainingprogram.update', 'uses' => 'TrainingProgramController@update']);

    Route::get('/mytraining/information', ['as' => 'mytraining.information', 'uses' => 'MyTrainingController@information']);
    Route::get('/mytraining/programlist', ['as' => 'mytraining.programlist', 'uses' => 'MyTrainingController@programlist']);
    Route::get('/mytraining/historystatistic', ['as' => 'mytraining.historystatistic', 'uses' => 'MyTrainingController@historystatistic']);
    Route::get('/mytraining/{id}/executetraining', ['as' => 'mytraining.executetraining', 'uses' => 'MyTrainingController@executetraining']);
    Route::post('/mytraining/{id}/executetraining', ['as' => 'mytraining.postexecute', 'uses' => 'MyTrainingController@postexecute']);
    Route::get('/mytraining/historystatistic/{id}/destroy', ['as' => 'mytraining.destroy', 'uses' => 'MyTrainingController@destroy']);
    Route::get('/mytraining/historystatistic/{id}/destroyconfirm', ['as' => 'mytraining.destroyconfirm', 'uses' => 'MyTrainingController@destroyconfirm']);


// non si puo usare lo shortcut as => dentro ajax quindi non lo metto neanche nelle route
    Route::get('/ajaxdatatablelanguage','AjaxController@loadDatatableLanguage' );

    Route::resource('administrator', 'AdministratorController');
    Route::get('/admin/users', ['as' => 'administrator.userslist', 'uses' => 'AdministratorController@users']);
    Route::get('/admin/exercise', ['as' => 'administrator.newexercise', 'uses' => 'AdministratorController@newexercise']);
    Route::get('/admin/list/exercises', ['as' => 'administrator.delexercise', 'uses' => 'AdministratorController@delexercise']);
    Route::get('/admin/list/exercise/{id}/destroy/confirm', ['as' => 'administrator.destroy.confirm', 'uses' => 'AdministratorController@confirmDestroy']);
    Route::get('/admin/list/trainingprogram/{id}/destroy', ['as' => 'administrator.destroy', 'uses' => 'AdministratorController@destroy']);

    
});
