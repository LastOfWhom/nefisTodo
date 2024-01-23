@extends('template')

@section('content')
    <div class="container">
        <h1>To-Do List</h1>
        <h2>Все задачи, проекты, пользователи</h2>
        <div class="list-group">
            <div class="col-md-3">
                <div>Все задачи</div>
                @foreach($tasks as $task)
                    <div class="btn-group">
                        <p class="list-group-item">{{ $task->text }}</p>
                    </div>
                @endforeach
                <div>Все проекты</div>
                @foreach($projects as $project)
                    <div class="btn-group">
                        <p class="list-group-item">{{ $project->text }}</p>
                    </div>
                @endforeach
                    <div>Все пользователи</div>
                @foreach($users as $user)
                    <div class="btn-group">
                        @if($user->id != auth()->id())
                            <p class="list-group-item">{{ $user->email }}</p>
                            <form action="{{route('user.delete', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
            <a href="{{route('project.main')}}"><button type="button" class="btn btn-danger">Назад</button></a>
        </div>
    </div>
@endsection
