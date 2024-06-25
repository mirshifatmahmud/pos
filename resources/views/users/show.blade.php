@extends('users.info-layout')

@section('showinfo')

<div class="card shadow mb-4">
    <div class="card-body">
      <h4><strong class="text-primary">{{ $user->name.' ' }}</strong>{{ $headLine }}</h4>
      <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>ID : </td>
                    <td>{{ $user->id }}</td>
                  </tr>
                  <tr>
                    <td>Admin ID : </td>
                    <td>{{ $user->admin_id }}</td>
                  </tr>
                  <tr>
                    <td>Group Name : </td>
                    <td>{{ $user->group_name }}</td>
                  </tr>
                  <tr>
                    <td>Name: </td>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <td>E-mail: </td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td>Phone : </td>
                    <td>{{ $user->phone }}</td>
                  </tr>
                  <tr>
                    <td>Address : </td>
                    <td>{{ $user->address }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection