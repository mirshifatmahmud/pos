@extends('layout.main')

@section('main_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>{{ $headLine }}</h1>
    <hr>

    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables for User Groups</h6>
        </div> --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">

                @if ($mode == 'edit')
                    {!! Form::model($user,['url' => 'user/'.$user->id,'method' => 'put']) !!}  
                @else
                    {!! Form::open(['url' => 'user','method' => 'post']) !!}
                @endif

                    <div class="form-group row">
                        {{ Form::label('group_id', 'User Groups', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('group_id', $groupList, null, ['class' => 'form-control', 'placeholder' => 'Select User Group']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('name', 'User Name', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('name',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('email', 'E-mail', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('email',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('phone', 'Phone', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('phone',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('address', 'Address', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('address',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                     
                      @if ($mode == 'create')
                      <div class="text-right">
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                      </div>
                      @else
                      <div class="text-right">
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                      </div>
                      @endif
                      

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
        
@endsection