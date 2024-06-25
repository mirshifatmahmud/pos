@extends('users.info-layout') 

@section('showinfo')

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Admin ID</th>
                        <th>User Name</th>
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user->sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->admin_id }}</td>
                        <td>{{ $sale->user->name }}</td>
                        <td>{{ $sale->invoice_no }}</td>
                        <td>{{ $sale->invoice_date }}</td>
                        <td class="text-center">
                            <form action="" method="POST">
                                @csrf
                                @method('delete') 
                                <a href="" class="btn btn-info btn-sm" ><i class="fa fa-eye-slash"></i></a>
                                <a href="" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
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