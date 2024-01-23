@extends('template')

@section('content')
    <div class="container">
        <h1>To-Do List</h1>
        <h2>Ваши задачи</h2>
        <form action="{{route('task.add')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Add a new task..." name="text">
                <input type="hidden" name="project_id" value="{{($project_id)}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add Task</button>
                </div>
            </div>
        </form>
        <div class="list-group">
            <div class="col-md-3">
                @foreach($tasks as $task)
                    <div class="btn-group">
                        @if($task->completed == 1)
                            <p class="list-group-item text-success" style="text-decoration: line-through">{{ $task->text }}</p>
                        @else
                            <p class="list-group-item text-danger">{{ $task->text }}</p>
                        @endif
                        <a href="{{route('task.edit', $task->id)}}"><button type="button" class="btn btn-warning">Изменить</button></a>
                        <form action="{{route('task.delete', $task->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                            <form action="{{route('task.finished', $task->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="completed" value="{{$task->completed}}">
                                <button type="submit" class="btn btn-primary" >Выполнена</button>
                            </form>
                    </div>
                @endforeach
            </div>
            <a href="{{route('project.main')}}"><button type="button" class="btn btn-danger">Назад</button></a>
        </div>
    </div>
@endsection
