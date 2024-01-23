@extends('auth.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Registration</h2>
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
                <form action="{{route('registration.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password again</label>
                        <input type="password" name="password_confirmation" class="form-control" id="InputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
