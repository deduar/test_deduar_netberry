@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tasks</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('category.index')}}" title="Create a Task"> Categories</a>
            <a class="btn btn-success" href="{{route('task.create')}}" title="Create a Task"> <i class="fas fa-plus-circle"></i></a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p></p>
    </div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Description</th>
        <th>Category</th>
        <th>Date Created</th>
        <th>Actions</th>
    </tr>
    @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->description}}</td>
            <td>{{$categories[$task->cat_id]->description}}</td>
            <td>{{$task->created_at}}</td>
            <td>

                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('task.show', $task->id) }}" class="btn btn-info">Show detail</a>
                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
                    </div>
                    <div class="col-md-6 text-right">
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['task.destroy', $task->id]
                        ]) !!}
                            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
</table>

{!! $tasks->links() !!}

@endsection