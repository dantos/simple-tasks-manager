<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller {

	public function index( Request $request) {

		$tasks = Task::when($request->project, function ($query) use ($request) {
			return $query->where('project_id', $request->project);
		})->orderByRaw('ISNULL(priority), priority ASC')
		  ->get();

		$projects = Project::all()->pluck('name', 'id')->prepend('');

		return view('tasks.index', compact('tasks', 'projects'));
	}

	public function create() {

		$projects = Project::all()->pluck('name', 'id')->prepend('');

		return view('tasks.create',  compact('projects'));
	}

	public function store(TaskRequest $request) {

		Task::create($request->safe()->all());

		return redirect(route('tasks.index'));
	}

	public function edit(Task $task) {

		$projects = Project::all()->pluck('name', 'id')->prepend('');

		return view('tasks.edit',  compact('task', 'projects'));
	}

	public function update(TaskRequest $request, Task $task) {

		$task->update($request->safe()->all());

		return redirect(route('tasks.index'));
	}

	public function destroy( Task $task ) {
		$task->delete();
		return redirect(route('tasks.index'));
	}

	public function updateTaskPriority( Request $request, Task $task ) {

		$requestedPriority = $request->priority;
		$currentPriority = $task->priority;

		if( $requestedPriority < $currentPriority ){
			Task::whereBetween('priority', [$requestedPriority, $currentPriority - 1])
			    ->increment('priority');
		}elseif( $requestedPriority > $currentPriority){
			Task::whereBetween('priority', [$currentPriority + 1, $requestedPriority])
			    ->decrement('priority');
		}

		$task->priority = $requestedPriority;
		$task->save();

		return response()->json();
	}
}
