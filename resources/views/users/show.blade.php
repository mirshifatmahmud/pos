@extends('layout.main')

@section('main_content')

<div class="row">
    <div class="col-md-6">
        <h1>Show Information</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('user/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Sales</button></a>
        <a href="{{ url('user/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Buys</button></a>
        <a href="{{ url('user/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Payment</button></a>
        <a href="{{ url('user/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Receipt</button></a>
    </div>
</div>
<hr>

<div class="row clearfix mt-5">
    <div class="col-2">
        <div class="nav flex-column nav-pills">
            <a href="#" class="nav-link  active">User Info</a>
            <a href="#" class="nav-link  ">Sales</a>
            <a href="#" class="nav-link  ">Payment</a>
            <a href="#" class="nav-link  ">Purchase</a>
            <a href="#" class="nav-link  ">Receipt</a>
        </div>
    </div>

    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6>Show <strong>{{ $user->name }}</strong> Information</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{ 'Group     : '.$user->group_name }} </br>
                    {{ 'Name      : '.$user->name }} </br>
                    {{ 'E-mail    : '.$user->email }} </br>
                    {{ 'Phone     : '.$user->phone }} </br>
                    {{ 'Address   : '.$user->address }} </br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection