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
Route::get('/verify', function () {
    return view('auth.verify');
})->name('verify');
Auth::routes();
Route::get('/home', [ App\Http\Controllers\backend\StudentController::class, 'element'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes pour les notes
Route::get('/edit-note/{iduser}/{idelement}', [App\Http\Controllers\backend\StudentController::class, 'editNote'])->name('edit');
Route::post('/update-note/{iduser}/{idelement}', [App\Http\Controllers\backend\StudentController::class, 'updateNote'])->name('update');
Route::get('/note/{id}', [App\Http\Controllers\backend\StudentController::class, 'Allstudent'])->name('note');






// Routes pour les professeurs
Route::get('/professeurs', [UserController::class, 'indexProfesseur'])->name('professeurs.index');
Route::get('/professeurs/create', [UserController::class, 'createProfesseur'])->name('professeurs.create');
Route::post('/professeurs', [UserController::class, 'storeProfesseur'])->name('professeurs.store');
Route::get('/professeurs/{id}', [UserController::class, 'showProfesseur'])->name('professeurs.show');
Route::get('/professeurs/{id}/edit', [UserController::class, 'ediProfesseur'])->name('professeurs.edit');
Route::put('/professeurs/{id}', [UserController::class, 'updateProfesseur'])->name('professeurs.update');
Route::delete('/professeurs/{id}', [UserController::class, 'destroyProfesseur'])->name('professeurs.destroy');

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
//module
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/create', [ModuleController::class,'create'])->name('modules.create');
Route::post('/modules', [ModuleController::class,'store'])->name('modules.store');
Route::get('/modules/{module}/edit', [ModuleController::class,'edit'])->name('modules.edit');
Route::put('/modules/{module}', [ModuleController::class,'update'])->name('modules.update');
Route::delete('/modules/{module}', [ModuleController::class,'destroy'])->name('modules.destroy');


//element_module
Route::get('/element_modules/create', [ElementModuleController::class, 'create'])->name('element_modules.create');
Route::post('/element_modules', [ElementModuleController::class, 'store'])->name('element_modules.store');
Route::get('/element_modules', [ElementModuleController::class, 'index'])->name('element_modules.index');
Route::get('/element_modules/{element_module}', [ElementModuleController::class, 'show'])->name('element_modules.show');
Route::get('/element_modules/{element_module}/edit', [ElementModuleController::class, 'edit'])->name('element_modules.edit');
Route::put('/element_modules/{element_module}', [ElementModuleController::class, 'update'])->name('element_modules.update');
Route::delete('/element_modules/{element_module}', [ElementModuleController::class, 'destroy'])->name('element_modules.destroy');





