<?php

use App\Http\Controllers\AnswerGPTController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SendToFreelancehuntController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/import-projects', [ProjectsController::class, 'importProjects']);
Route::get('/answer-gpt', [AnswerGPTController::class, 'sendProjectsToChatGPT']);
Route::get('/answer-send', [SendToFreelancehuntController::class, 'sendResponse']);

