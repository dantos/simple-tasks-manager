<?php

	use App\Http\Controllers\TasksController;
	use Illuminate\Support\Facades\Route;

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
    return redirect(route('tasks.index'));
});

Route::resource('tasks', TasksController::class)->except('show');
Route::post('task/{task}/priority/update',[TasksController::class, 'updateTaskPriority'] )->name('task.priority.update');