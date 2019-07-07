@extends('layouts.app')
@section('content')
<div class="card-body">
  
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{csrf_field()}}
        <div class="row">
            <div class="form-group">
                <label for="Task" class="col-sm-3 control-label">Task</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text"name="name"id="task-name"class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">Add task</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
</div>


@if(count($tasks)>0)
<div class="card">
    <div class="card-heading">
        Current tasks
    </div>
    <div class="card-body">
        @include('errors')
        <table class="table-striped task-table">
            <thead>
            <td></td>
            <td></td>
            </thead>
            <tbody>
               @foreach($tasks as $task) 
            <td>{{$task->name}}</td>
            <td>
                <form action="{{url('task/'.$task->id)}}" method="POST">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger">Delete</button>
                    
                </form>
            </td>
             @endforeach   
            </tbody>
        </table>
    </div>
</div>

@endif
@endsection
