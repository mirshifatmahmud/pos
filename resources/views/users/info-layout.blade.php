@extends('layout.main')

@section('main_content')

<div class="row">
    <div class="col-md-6">
        <h1>Information Dashboard</h1>
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
            <a href="{{ url('user/'.$user->id) }}" class="nav-link active">User Info</a>
            <a href="{{ url('user/'.$user->id.'/sales') }}" class="nav-link">Sales</a>
            <a href="{{ url('user/'.$user->id.'/payment') }}" class="nav-link  ">Payment</a>
            <a href="{{ url('user/'.$user->id.'/purchase') }}" class="nav-link  ">Purchase</a>
            <a href="{{ url('user/'.$user->id.'/receipt') }}" class="nav-link  ">Receipt</a>
        </div>
    </div>

    <div class="col-10">

        @yield('showinfo')

    </div>
</div>

@endsection