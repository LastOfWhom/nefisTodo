<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>ToDo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('project.main')}}">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('active')}}">Активные</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route('completed')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Законченные задачи
                </a>
              </li>
                @can('view', auth()->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('editUser')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Редактирование пользователей
                        </a>
                    </li>
                @endcan
            </ul>
          </div>
            <div>id пользователя:{{Auth::id()}}</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Выход</button>
            </form>
        </div>
      </nav>

    @yield('content')


</html>
