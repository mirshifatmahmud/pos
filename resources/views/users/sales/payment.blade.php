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
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->payment as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->admin_id }}</td>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->note }}</td>
                        <td class="text-center">
                            <form action="{{ url('user/'.$user->id) }}" method="POST">
                                @csrf
                                @method('delete') 
                                <a href="{{ url('user/'.$user->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-eye-slash"></i></a>
                                <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
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