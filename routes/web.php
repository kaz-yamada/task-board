<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CardListController;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', [BoardController::class, 'index'])
    ->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/board/{boardId}', [BoardController::class, 'show'])
    ->name('board');

Route::middleware(['auth:sanctum', 'verified'])->post('/board', [BoardController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/board', [BoardController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->post('/list', [CardListController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('/card', [CardController::class, 'store']);
