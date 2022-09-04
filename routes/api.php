<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')
    ->namespace('Api')
    ->group(function () {

        Route::prefix('home')->group(function () {
            Route::get('/organizationInfo/{organizationId}/{branchId}', [OrganizationController::class, 'index']);
            Route::post('/doctor/newFeedback/{doctorId}', [DoctorController::class, 'addFeedback']);
            Route::post('/organization/feedback/{organizationId}/{branchId}', [OrganizationController::class, 'addFeedback']);
            Route::get('/organization/survey/{organizationId}/{surveyId}', [OrganizationController::class, 'getSurvey']);
        });
    });
