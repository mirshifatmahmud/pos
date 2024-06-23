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
                    {!! Form::model($product,['url' => 'product/'.$product->id,'method' => 'put']) !!}  
                @else
                    {!! Form::open(['url' => 'product','method' => 'post']) !!}
                @endif

                    <div class="form-group row">
                        {{ Form::label('category_name', 'Select Category', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('category_name', $categoryList, null, ['class' => 'form-control', 'placeholder' => 'Select User Group']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('title', 'Product Title', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('title',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('description',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('cost_price', 'Cost Price', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('cost_price',null,['class' => 'form-control']) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        {{ Form::label('price', 'Price', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('price',null,['class' => 'form-control']) }}
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