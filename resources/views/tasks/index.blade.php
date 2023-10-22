@extends('layouts.basic')
@section('content')
  <div class="tasks-header">
    <h2>Task</h2>
    <select id="project-filter">
      <option value="" disabled selected hidden>Filter tasks by project...</option>
      @foreach($projects as $id => $project)
        <option value="{{$id}}" @selected(request()->has('project') && request()->project == $id)>{{$project}}</option>
      @endforeach
    </select>
    <a href="{{route('tasks.create')}}">Add</a>
  </div>
  <div class="task-body">
    <ul id="sortable">
      @foreach($tasks as $task)
        <li class="ui-state-default" id="{{$task->id}}" data-id="{{$task->id}}" data-priority="{{$task->priority}}">
          <div class="info"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$task->priority}} - {{$task->name}}
          </div>
          <div class="time">{{$task->date}}</div>
          <div class="project">{{$task->project?->name}}</div>
          <div class="actions">
            <a href="{{route('tasks.edit', [$task->id])}}">Edit</a>
            <a href="javascript:void(0)" onclick="deleteTask({{$task->id}})">Remove</a>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
  <div id="delete-form-container"></div>
  @push('scripts')
    <script>
      function deleteTask(id) {
        let csfr = $('meta[name="csrf-token"]').attr('content');
        let deleteForm =
          `<form id="remove-form" method="POST" action="/tasks/${id}">
            <input name="_token" value="${csfr}" type="hidden">
            <input type="hidden" name="_method" value="DELETE">
           </form>
          `;

        $("#delete-form-container").html(deleteForm);
        $("#delete-form-container form").submit();
      }

      function updateTaskPriority(taskId, priority) {
        var settings = {
          "url": `task/${taskId}/priority/update`,
          "method": "POST",
          "headers": {
            "Content-Type": "application/json",
          },
          "data": JSON.stringify({
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "priority": priority
          }),
        };

        $.ajax(settings).done(function (response) {
          window.location.reload();
        });
      }
    </script>
  @endpush
@endsection
