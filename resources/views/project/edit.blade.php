@extends('template')

@section('content')

    <div class="container">
        <h1>To-Do List</h1>
        <h2>Ваши проекты</h2>
        <form action="{{route('project.update',$project->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Add a new task..." name="text">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add Task</button>
                </div>
            </div>
            <div class="list-group">
                <div class="col-md-3">
                    <h3>Изменяемый текст</h3>
                    <input name="text" value="{{ $project->text }}">
                    <button type="submit" class="btn btn-warning">Изменить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
