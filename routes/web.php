<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\TechStackController;
use App\Http\Controllers\WorkHistoryController;
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
// Routes to CRUD sociallinks
    Route::middleware([])->group(function () {
        Route::middleware(['auth'])->get('/backend/features/sociallinks/index', [SocialLinkController::class, 'index'])->name('backend.features.sociallinks.index');
        Route::middleware(['auth'])->get('/backend/features/sociallinks/create', [SocialLinkController::class, 'create'])->name('backend.features.sociallinks.create');
        Route::middleware(['auth'])->post('/backend/features/sociallinks/store', [SocialLinkController::class, 'store'])->name('backend.features.sociallinks.store');
        Route::middleware(['auth'])->get('/backend/features/sociallinks/{socialLink}/edit', [SocialLinkController::class, 'edit'])->name('backend.features.sociallinks.edit');
        Route::middleware(['auth'])->post('/backend/features/sociallinks/{socialLink}/update', [SocialLinkController::class, 'update'])->name('backend.features.sociallinks.update');
        Route::middleware(['auth'])->post('/backend/features/sociallinks/{socialLink}/delete', [SocialLinkController::class, 'destroy'])->name('backend.features.sociallinks.delete');
    });
// Routes to CRUD workhistories
    Route::middleware([])->group(function () {
        Route::middleware(['auth'])->get('/backend/features/workhistories/index', [WorkHistoryController::class, 'index'])->name('backend.features.workhistories.index');
        Route::middleware(['auth'])->get('/backend/features/workhistories/create', [WorkHistoryController::class, 'create'])->name('backend.features.workhistories.create');
        Route::middleware(['auth'])->post('/backend/features/workhistories/store', [WorkHistoryController::class, 'store'])->name('backend.features.workhistories.store');
        Route::middleware(['auth'])->get('/backend/features/workhistories/{workHistory}/edit', [WorkHistoryController::class, 'edit'])->name('backend.features.workhistories.edit');
        Route::middleware(['auth'])->post('/backend/features/workhistories/{workHistory}/update', [WorkHistoryController::class, 'update'])->name('backend.features.workhistories.update');
        Route::middleware(['auth'])->post('/backend/features/workhistories/{workHistory}/delete', [WorkHistoryController::class, 'destroy'])->name('backend.features.workhistories.delete');
    });
// Routes to CRUD projects
    Route::middleware([])->group(function () {
        Route::middleware(['auth'])->get('/backend/features/projects/index', [ProjectController::class, 'index'])->name('backend.features.projects.index');
        Route::middleware(['auth'])->get('/backend/features/projects/create', [ProjectController::class, 'create'])->name('backend.features.projects.create');
        Route::middleware(['auth'])->post('/backend/features/projects/store', [ProjectController::class, 'store'])->name('backend.features.projects.store');
        Route::middleware(['auth'])->get('/backend/features/projects/{project}/edit', [ProjectController::class, 'edit'])->name('backend.features.projects.edit');
        Route::middleware(['auth'])->post('/backend/features/projects/{project}/update', [ProjectController::class, 'update'])->name('backend.features.projects.update');
        Route::middleware(['auth'])->post('/backend/features/projects/{project}/delete', [ProjectController::class, 'destroy'])->name('backend.features.projects.delete');
    });

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
