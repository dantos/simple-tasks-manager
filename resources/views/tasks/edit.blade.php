@extends('layouts.basic')
@section('content')
  @include('tasks.form', ['action' => route('tasks.update', [$task->id]), 'method' => 'PUT'])
@endsection
