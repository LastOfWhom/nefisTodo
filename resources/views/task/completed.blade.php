@extends('template')

@section('content')
    <div class="container">
        <h1>To-Do List</h1>
        <h2>Ваши завершенный задачи</h2>
        <div class="list-group">
            <div class="col-md-3">
                @foreach($tasks as $task)
                    <div class="btn-group">
                        <p class="list-group-item">{{ $task->text }}</p>
                        <a href="{{route('task.edit', $task->id)}}"><button type="button" class="btn btn-warning">Изменить</button></a>
                        <form action="{{route('task.delete', $task->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                        <a href=""><button type="button" class="btn btn-primary ">Выполнена</button></a>
                    </div>
                @endforeach
            </div>
            <a href="{{route('project.main')}}"><button type="button" class="btn btn-danger">Назад</button></a>
        </div>
    </div>
@endsection


