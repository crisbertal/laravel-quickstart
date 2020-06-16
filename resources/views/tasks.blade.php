@extends('layouts.app')

@section('content')

    <div class="panel-body">
        @include('common.errors')

        <form action="/task" method="POST" class="form-horizontal">
            @csrf

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus">Add Task</i>
                    </button>
                </div> 
            </div>
        </form>
    </div>

    <!-- TODO: Current Task -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current task
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table"> 

                <!-- Table Headings -->
                <thead>
                    <th>Task</th> 
                    <th>&nbsp;</th> 
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($task as $task)
                        <tr>
                            <!-- Task Name -->
                            <td>
                                <div>{{ $task->name }}</div> 
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></id> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </div>
        </div>
    @endif
@endsection