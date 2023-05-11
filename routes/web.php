<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
Use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ElementModuleController;
use App\Http\Controllers\FiliereController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Routes pour les notes
// Routes pour les notes
Route::get('/edit-note/{idelement}/{iduser}', [App\Http\Controllers\backend\StudentController::class, 'editNote'])->name('edit');
Route::post('/update-note/{idelement}/{iduser}', [App\Http\Controllers\backend\StudentController::class, 'updateNote'])->name('update');
Route::get('/note/{id}', [App\Http\Controllers\backend\StudentController::class, 'Allstudent'])->name('note');
Route::get('/note_module/{id_S}', [App\Http\Controllers\backend\StudentController::class, 'noteEtud'])->name('note_module');
Route::get('/note_S', [App\Http\Controllers\backend\StudentController::class, 'noteSemestre'])->name('note_semestre');
Route::get('/export/{id}', [App\Http\Controllers\backend\StudentController::class, 'export'])->name('export');
Route::post('/add/{idelement}/{iduser}', [App\Http\Controllers\backend\StudentController::class, 'addNote'])->name('add1');
Route::get('/modify-note/{idelement}/{iduser}', [App\Http\Controllers\backend\StudentController::class, 'modify'])->name('modify');



// Routes pour les professeurs
Route::get('/professeurs', [UserController::class, 'indexProfesseur'])->name('professeurs.index');
Route::get('/professeurs/create', [UserController::class, 'createProfesseur'])->name('professeurs.create');
Route::post('/professeurs', [UserController::class, 'storeProfesseur'])->name('professeurs.store');
Route::get('/professeurs/{id}', [UserController::class, 'showProfesseur'])->name('professeurs.show');
Route::get('/professeurs/{id}/edit', [UserController::class, 'editProfesseur'])->name('professeurs.edit');
Route::put('/professeurs/{id}', [UserController::class, 'updateProfesseur'])->name('professeurs.update');
Route::delete('/professeurs/{id}', [UserController::class, 'destroyProfesseur'])->name('professeurs.destroy');
Route::get('/teacher/{id}/element-module', [UserController::class, 'getElementModuleByTeacher'])->name('teacher.element-module');

// Routes pour les étudiants
Route::get('/etudiants', [UserController::class, 'indexEtudiant'])->name('etudiants.index');
Route::get('/etudiants/create', [UserController::class, 'createEtudiant'])->name('etudiants.create');
Route::post('/etudiants', [UserController::class, 'storeEtudiant'])->name('etudiants.store');
Route::get('/etudiants/{id}', [UserController::class, 'showEtudiant'])->name('etudiants.show');
Route::get('/etudiants/{id}/edit', [UserController::class, 'editEtudiant'])->name('etudiants.edit');
Route::put('/etudiants/{id}', [UserController::class, 'updateEtudiant'])->name('etudiants.update');
Route::delete('/etudiants/{id}', [UserController::class, 'destroyEtudiant'])->name('etudiants.destroy');
// Routes pour l'administrateur

Route::get('/administrateurs', [UserController::class, 'indexAdministrateur'])->name('administrateurs.index');
Route::get('/administrateurs/create', [UserController::class, 'createAdministrateur'])->name('administrateurs.create');
Route::post('/administrateurs', [UserController::class, 'storeAdministrateur'])->name('administrateurs.store');
Route::get('/administrateurs/{id}', [UserController::class, 'showAdministrateur'])->name('administrateurs.show');
Route::get('/administrateurs/{id}/edit', [UserController::class, 'editAdministrateur'])->name('administrateurs.edit');
Route::put('/administrateurs/{id}', [UserController::class, 'updateAdministrateur'])->name('administrateurs.update');
Route::delete('/administrateurs/{id}', [UserController::class, 'destroyAdministrateur'])->name('administrateurs.destroy');

Route::get('/filiere', [FiliereController::class,'index'])->name('filiere.index');
Route::get('/filiere/create', [FiliereController::class,'create'])->name('filiere.create');
Route::post('/filiere', [FiliereController::class,'store'])->name('filiere.store');
Route::get('/filiere/{filiere}', [FiliereController::class,'show'])->name('filiere.show');
Route::get('/filiere/{filiere}/edit', [FiliereController::class,'edit'])->name('filiere.edit');
Route::put('/filiere/{filiere}',[FiliereController::class,'update'])->name('filiere.update');
Route::delete('/filiere/{filiere}', [FiliereController::class,'destroy'])->name('filiere.destroy');
Route::get('/filiere/{id}/etudiants', [FiliereController::class,'etudiants'])->name('filiere.etudiants');
Route::get('filieres/{id}/modules', [FiliereController::class, 'modules'])->name('filiere.modules');

// modules
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
Route::get('/module/{id}/elements', [ModuleController::class, 'getElementModuleByModule'])->name('module.elements');

//element_module
Route::get('/element_modules/create', [ElementModuleController::class, 'create'])->name('element_modules.create');
Route::post('/element_modules', [ElementModuleController::class, 'store'])->name('element_modules.store');
Route::get('/element_modules', [ElementModuleController::class, 'index'])->name('element_modules.index');
Route::get('/element_modules/{element_module}', [ElementModuleController::class, 'show'])->name('element_modules.show');
Route::get('/element_modules/{element_module}/edit', [ElementModuleController::class, 'edit'])->name('element_modules.edit');
Route::put('/element_modules/{element_module}', [ElementModuleController::class, 'update'])->name('element_modules.update');
Route::delete('/element_modules/{element_module}', [ElementModuleController::class, 'destroy'])->name('element_modules.destroy');
//statistique
Route::get('/dashboard/Admin', [UserController::class, 'getStudentCount']);

///notes
Route::get('/modules/{module}/notes', [NoteController::class, 'index'])->name('notes.index');
Route::put('/modules/{module}/notes', [NoteController::class, 'update'])->name('notes.update');
//profile
Route::get('/home', [App\Http\Controllers\HomeController::class, 'showuser'])->name('home');





