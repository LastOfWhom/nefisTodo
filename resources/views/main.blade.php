@extends('template')

@section('content')

<div class="container">

    <h1>To-Do List</h1>
    <h2>Ваши проекты</h2>
    <form action="{{route('project.add')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Add a new task..." name="text">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Add Task</button>
            </div>
        </div>
    </form>
    <div class="list-group">
        <div class="col-md-3">
            @foreach($projects as $project)
                <div class="btn-group">
                    <p class="list-group-item">{{ $project->text }}</p>
                    <a href="{{route('project.show', $project->id)}}"><button type="button" class="btn btn-primary">Посмотреть</button></a>
                    <form action="{{route('project.delete', $project->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                    <a href="{{route('project.edit', $project->id)}}"><button type="button" class="btn btn-warning">Изменить</button></a>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
