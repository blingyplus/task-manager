<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
Route::resource('tasks', TaskController::class);
// New route for updating task order
Route::post('/tasks/update-order', [TaskController::class, 'updateOrder'])->name('tasks.updateOrder');

Route::get('/', function () {
    return view('tasks');
});
