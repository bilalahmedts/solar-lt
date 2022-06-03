<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\VoiceEvaluation\VoiceEvaluationController;
use App\Http\Controllers\VoiceEvaluation\CategoryController;
use App\Http\Controllers\VoiceEvaluation\DatapointController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\CMUController;
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

Route::middleware('auth')->get('/', function () {
    return view('welcome');
});


// secured routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/edit/{user}', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('campaigns')->group(function () {

        Route::get('/', [CampaignController::class, 'index'])->name('campaigns.index');
        Route::get('/create', [CampaignController::class, 'create'])->name('campaigns.create');
        Route::post('/store', [CampaignController::class, 'store'])->name('campaigns.store');
        Route::get('/edit/{campaign}', [CampaignController::class, 'edit'])->name('campaigns.edit');
        Route::put('/edit/{campaign}', [CampaignController::class, 'update'])->name('campaigns.update');
        Route::get('/delete/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
    });

    Route::prefix('roles')->group(function () {

        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/edit/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    Route::prefix('voice-evaluation')->group(function () {

        Route::get('/', [VoiceEvaluationController::class, 'index'])->name('voice-evaluations.index');

        /** Below are all the routes that deal with categories */
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('voice-evaluations.categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('voice-evaluations.categories.store');
        Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('voice-evaluations.categories.edit');
        Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('voice-evaluations.categories.update');
        Route::get('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('voice-evaluations.categories.destroy');

        /** Below are all the routes that deal with Datapoints */
        Route::get('/datapoints/create/{category}', [DatapointController::class, 'create'])->name('voice-evaluations.datapoints.create');
        Route::post('/datapoints/store/{category}', [DatapointController::class, 'store'])->name('voice-evaluations.datapoints.store');
        Route::get('/datapoints/edit/{datapoint}', [DatapointController::class, 'edit'])->name('voice-evaluations.datapoints.edit');
        Route::put('/datapoints/update/{datapoint}', [DatapointController::class, 'update'])->name('voice-evaluations.datapoints.update');
        Route::get('/datapoints/delete/{datapoint}', [DatapointController::class, 'destroy'])->name('voice-evaluations.datapoints.destroy');
    });

    Route::prefix('audit')->group(function () {
        Route::get('/', [AuditController::class, 'index'])->name('audit.index');
        Route::get('/create', [AuditController::class, 'create'])->name('audit.create');
        Route::get('/get-user-detail/{id}', [AuditController::class, 'getUserDetail'])->name('audit.get-user-detail');
        Route::post('/store', [AuditController::class, 'store'])->name('audit.store');
        Route::get('/edit/{audit}', [AuditController::class, 'edit'])->name('audit.edit');
        Route::put('/update/{audit}', [AuditController::class, 'update'])->name('audit.update');
        Route::get('/delete/{audit}', [AuditController::class, 'destroy'])->name('audit.destroy');
        Route::get('/audit-report', [AuditController::class, 'report'])->name('audit.report');
        Route::post('/audit-report', [AuditController::class, 'getDataByDate'])->name('audit.report');
    });
});

// unsecure routes
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});
