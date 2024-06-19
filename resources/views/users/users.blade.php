@extends('layout.main')

@section('main_content')

    <div class="row">
        <div class="col-md-6">
            <h1>All Users</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('user/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New User</button></a>
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
                            <th>Admin_id</th>
                            <th>Group_id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
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

                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->admin_id }}</td>
                            <td>{{ $user->group->title }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td class="text-center">
                                <form action="{{ url('user/'.$user->id) }}" method="POST">
                                    @csrf
                                    @method('delete') 
                                    <a href="#" class="btn btn-info btn-sm" ><i class="fa fa-eye-slash"></i></a>
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