@extends('layouts.basic')
@section('content')
  @include('tasks.form', ['action' => route('tasks.store'), 'method' => 'POST'])
@endsection
