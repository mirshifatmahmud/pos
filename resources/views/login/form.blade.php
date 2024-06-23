@extends('layout.primary')

@section('primary')

    <div class="container w-50 border shadow rounded mt-5">

        <div class="p-2">
            <div class="text-center">
                <h1>Admin Login</h1>
                <hr>
            </div>
            <form class="user" method="post" action="{{url('login')}}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small" href="register.html">Create an Account!</a>
            </div>
        </div>

    </div>

@endsection