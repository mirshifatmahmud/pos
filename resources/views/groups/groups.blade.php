@extends('layout.main')

@section('main_content')

    <div class="row">
        <div class="col-md-6">
            <h1>User Groups</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('groups/create') }}"><button class="btn btn-primary"><i class="fas fa-plus-circle"></i> New Group</button></a>
        </div>
    </div>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables for User Groups</h6>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
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

                        @foreach ($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->title }}</td>
                            <td>
                                <form action="{{ url('groups/delete/'.$group->id) }}" method="POST">
                                    @csrf
                                    @method('delete') 
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