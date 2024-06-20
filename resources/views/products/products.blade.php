@extends('layout.main')

@section('main_content')

    <div class="row">
        <div class="col-md-6">
            <h1>All Procuct</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('product/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Product</button></a>
        </div>
    </div>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables for User users</h6>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category_id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Cost_Price</th>
                            <th>Price</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>

                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td class="text-center">
                                <form action="{{ url('product/'.$product->id) }}" method="POST">
                                    @csrf
                                    @method('delete') 
                                    <a href="{{ url('product/'.$product->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye-slash"></i></a>
                                    <a href="{{ url('product/'.$product->id.'/edit') }}" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" ><i class="fa fa-minus-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection