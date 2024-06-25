@extends('layout.main')

@section('main_content')

<div class="row">
    <div class="col-md-6">
        <h1>Information Dashboard</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('') }}"><button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add Sales</button></a>
        <a href="{{ url('') }}"><button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add Purchase</button></a>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#payment">
            <i class="fas fa-plus-circle"></i> Add Payment
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#receipt">
            <i class="fas fa-plus-circle"></i> Add Receipt
          </button>
    </div>
</div>
<hr>

<div class="row clearfix mt-5">
    <div class="col-2">
        <div class="nav flex-column nav-pills">
            <a href="{{ url('user/'.$user->id) }}" class="nav-link active">User Info</a>
            <a href="{{ url('user/'.$user->id.'/sales') }}" class="nav-link">Sales</a>
            <a href="{{ url('user/'.$user->id.'/purchase') }}" class="nav-link  ">Purchase</a>
            <a href="{{ url('user/'.$user->id.'/payment') }}" class="nav-link  ">Payment</a>
            <a href="{{ url('user/'.$user->id.'/receipt') }}" class="nav-link  ">Receipt</a>
        </div>
    </div>

    <div class="col-10">

        @yield('showinfo')

    </div>
</div>


<!-- Add Payment Modal -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="paymentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
        {!! Form::open(['url' => 'user/'.$user->id.'/payment','method' => 'post']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentLabel">Add Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                {{ Form::label('date', 'Payment Date', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::date('date',null,['class' => 'form-control']) }}
                </div>
                </div>

                <div class="form-group row">
                {{ Form::label('amount', 'Amount', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('amount',null,['class' => 'form-control']) }}
                </div>
                </div>

                <div class="form-group row">
                {{ Form::label('note', 'Note', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::textarea('note',null,['class' => 'form-control','rows' => '3']) }}
                </div>
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

<!-- Add Receipt Modal -->
<div class="modal fade" id="receipt" tabindex="-1" role="dialog" aria-labelledby="receiptLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
        {!! Form::open(['url' => 'user/'.$user->id.'/receipt','method' => 'post']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptLabel">Add Receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                {{ Form::label('date', 'Payment Date', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::date('date',null,['class' => 'form-control']) }}
                </div>
                </div>

                <div class="form-group row">
                {{ Form::label('amount', 'Amount', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('amount',null,['class' => 'form-control']) }}
                </div>
                </div>

                <div class="form-group row">
                {{ Form::label('note', 'Note', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::textarea('note',null,['class' => 'form-control','rows' => '3']) }}
                </div>
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@endsection