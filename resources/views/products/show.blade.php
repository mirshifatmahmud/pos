@extends('layout.main')

@section('main_content')

    <div class="row">
        <div class="col-md-6">
            <h1>Show Information</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('product/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Sales</button></a>
            <a href="{{ url('product/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Buys</button></a>
            <a href="{{ url('product/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Payment</button></a>
            <a href="{{ url('product/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Receipt</button></a>
        </div>
    </div>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>Show <strong>{{ $product->title }}</strong> Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{ 'Category     : '.$product->category->title }} </br>
                {{ 'Title      : '.$product->title }} </br>
                {{ 'Description    : '.$product->description }} </br>
                {{ 'Cost Price     : '.$product->cost_price }} </br>
                {{ 'Price   : '.$product->price }} </br>
            </div>
        </div>
    </div>

@endsection