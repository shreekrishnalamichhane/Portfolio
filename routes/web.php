<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TechStackController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PublicController::class, 'home']);

Auth::routes();

Route::group([], function () {
// Routes to CRUD skills
    Route::middleware([])->group(function () {
        Route::middleware(['auth'])->get('/backend/features/skills/index', [SkillController::class, 'index'])->name('backend.features.skills.index');
        Route::middleware(['auth'])->get('/backend/features/skills/create', [SkillController::class, 'create'])->name('backend.features.skills.create');
        Route::middleware(['auth'])->post('/backend/features/skills/store', [SkillController::class, 'store'])->name('backend.features.skills.store');
        Route::middleware(['auth'])->get('/backend/features/skills/{skill}/edit', [SkillController::class, 'edit'])->name('backend.features.skills.edit');
        Route::middleware(['auth'])->post('/backend/features/skills/{skill}/update', [SkillController::class, 'update'])->name('backend.features.skills.update');
        Route::middleware(['auth'])->post('/backend/features/skills/{skill}/delete', [SkillController::class, 'destroy'])->name('backend.features.skills.delete');
    });
// Routes to CRUD techstacks
    Route::middleware([])->group(function () {
        Route::middleware(['auth'])->get('/backend/features/techstacks/index', [TechStackController::class, 'index'])->name('backend.features.techstacks.index');
        Route::middleware(['auth'])->get('/backend/features/techstacks/create', [TechStackController::class, 'create'])->name('backend.features.techstacks.create');
        Route::middleware(['auth'])->post('/backend/features/techstacks/store', [TechStackController::class, 'store'])->name('backend.features.techstacks.store');
        Route::middleware(['auth'])->get('/backend/features/techstacks/{techStack}/edit', [TechStackController::class, 'edit'])->name('backend.features.techstacks.edit');
        Route::middleware(['auth'])->post('/backend/features/techstacks/{techStack}/update', [TechStackController::class, 'update'])->name('backend.features.techstacks.update');
        Route::middleware(['auth'])->post('/backend/features/techstacks/{techStack}/delete', [TechStackController::class, 'destroy'])->name('backend.features.techstacks.delete');
    });

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
