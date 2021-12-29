@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Categories</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('task.index')}}" title="Create a Task"> Tasks</a>
            <a class="btn btn-success" href="{{route('category.create')}}" title="Create a category"> <i class="fas fa-plus-circle"></i></a>
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
        <th>Date Created</th>
        <th>Actions</th>
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->created_at}}</td>
            <td>

                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">Show detail</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit categoty</a>
                    </div>
                    <div class="col-md-6 text-right">
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['category.destroy', $category->id]
                        ]) !!}
                            {!! Form::submit('Delete this category?', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
</table>

{!! $categories->links() !!}

@endsection