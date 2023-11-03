<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Tag_taskController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TasktagController;
use App\Http\Controllers\UserController;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use App\Models\Tasktag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/myprojects',[ProjectController::class,'index']);
Route::middleware('auth:sanctum','match_project')->get('/myprojects/{project}',[ProjectController::class,'show']);

Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('projects', ProjectController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('users', UserController::class);

Route::post('/register', [AuthController::class, 'register']);