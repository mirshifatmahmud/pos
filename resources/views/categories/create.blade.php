@extends('layout.main')

@section('main_content')

    <h1>Product Category Create</h1>
    <hr>

    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables for User Groups</h6>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ url('category') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Category Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title here">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
        
@endsection