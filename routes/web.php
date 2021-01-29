<?php

use App\Http\Controllers\BoardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/boards', function () {
    return Inertia::render('Boards');
})->name('boards');

Route::middleware('auth:sanctum')->get('/boards/all', [BoardController::class, 'boards']);
Route::middleware('auth:sanctum')->get('/boards/{boardId}', [BoardController::class, 'cardLists']);
Route::middleware('auth:sanctum')->post('/board', [BoardController::class, 'newBoard']);
