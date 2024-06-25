@extends('users.info-layout') 

@section('showinfo')

<div class="card shadow mb-4">
    <div class="card-body">
        <h4><strong class="text-primary">{{ $user->name.' ' }}</strong>{{ $headLine }}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Admin Name</th>
                        <th>User Name</th>
                        <th>Invoice No</th>
                        <th>Invoice Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user->purchase as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->admin->name }}</td>
                        <td>{{ $purchase->user->name }}</td>
                        <td>{{ $purchase->invoice_no }}</td>
                        <td>{{ $purchase->invoice_date }}</td>
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