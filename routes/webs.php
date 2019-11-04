<?php

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
// custumer excel

Route::get('/import_excel', 'ImportExcelController@index');
Route::post('/import_excel/import', 'ImportExcelController@import');
Route::get('export-file/{type}', 'ImportExcelController@exportFile')->name('export.file');

//item excel

Route::get('importExport', 'MaatwebsiteDemoController@importExport');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');

//products excel

Route::get('import-export-view', 'ExcelController@importExportView')->name('import.export.view');

Route::post('import-file', 'ExcelController@importFile')->name('import.file');

//Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');

Route::get('/', function () {
    return view('welcome');
});

Route::get('generate-pdf','HomeController@generatePDF');


//Route::POST('upload', 'StudentController@upload')->name('file.upload');

Route::get('/messages', 'AdminController@admin');
Route::get('/messagess', 'AdminController@gerant');


Route::get('/admin', 'AdminController@login');
Route::post('/admin', 'AdminController@login');

Route::get('/compte', 'AdminController@compte_connecter');
Route::post('/compte', 'AdminController@compte')->name('compte.connecter');


Route::get('participant/{id}', 'StudentController@participant')->name('participant.show');

Route::get('Enseignant/{id}', 'EnseignantController@Enseignant')->name('Enseignant.show');

Route::get('/ajouter', 'EnseignantController@ajouter')->name('entreprise.ajouter');
Route::post('/ajouter', 'EnseignantController@ajouter_entreprise');


Route::get('/contrat', function () {
    return view('contrat');     
});

Route::group(['middleware' => 'Connecter'], function(){

    Route::resource('students', 'StudentController');

    Route::resource('enseignants', 'EnseignantController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
