<form class="tasks-form" action="{{$action}}" method="POST">
  @csrf
  @if($method == 'PUT')
    <input type="hidden" name="_method" value="PUT">
  @endif

    <label for="name">Name</label>
    <input value="{{ isset($task)? $task->name : '' }}" id="name" name="name" type="text" class="@error('name') is-invalid @enderror">
    @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="priority">Priority</label>
    <input value="{{ isset($task)? $task->priority : '' }}" id="priority" name="priority" type="number"  min="0" class="@error('priority') is-invalid @enderror">
    @error('priority')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label for="datetime-picker">Date</label>
    <input value="{{ isset($task)? $task->date : '' }}" id="datetime-picker" name="date" type="text"  placeholder="Please select a date..." class="@error('priority') is-invalid @enderror date-time-selector">
    @error('date')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for=project_id">Project</label>
    <select id="project_id" name="project_id">
      @foreach ($projects as $projectId => $project)
        <option value="{{$projectId}}" @selected(isset($task) && $task->project_id == $projectId) >
          {{ $project }}
        </option>
      @endforeach
    </select>
  <button type="submit">Save</button>
</form>

