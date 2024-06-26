@extends('users.info-layout') 

@section('showinfo')

<div class="card shadow mb-4">
    <div class="card-body">
        <h4><strong class="text-primary">{{ $user->name.' ' }}</strong>{{ $headLine }}</h4>
        <hr>
        <div class="row justify-content-md-center clearfix">
            <div class="col-md-6">
                <h5 class="text-info">Coustomer Info</h5>
                <hr>
                <p>Name : {{ $user->name }}</p>
                <p>E-mail : {{ $user->email }}</p>
                <p>Phone : {{ $user->phone }}</p>
            </div>
            <div class="col-md-6">
                <h5 class="text-info">Invoice Info</h5>
                <hr>
                <p>Invoice No : {{ $invoice->invoice_date }}</p>
                <p>Invoice Date : {{ $invoice->invoice_no }}</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center" colspan="4">Total Bills</th>
                        <th colspan="2">{{ $invoice->item()->sum('total') }}</th>

                    </tr>
                </tfoot>
                <tbody>


                    
                  

                    @foreach ($invoice->item as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ optional($item->product)->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total }}</td>
                        
                        
                        <td class="text-center">
                            <form action="{{ route('user.sales.invoices.delete-item',['id'=>$user->id,'invoice_id'=>$invoice->id,'item_id'=>$item->id]) }}" method="POST">
                                @csrf
                                @method('delete') 
                                <a href="#" class="btn btn-info btn-sm" ><i class="fa fa-eye-slash"></i></a>
                                <a href="#" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" ><i class="fa fa-minus-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#additem">
  Add Item
</button>

<!-- Add salesInvoice Modal -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="additemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        
        {!! Form::open(['route'=>['user.sales.invoices.add-item',$user->id,$invoice->id],'method'=>'post']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="additemLabel">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    {{ Form::label('product_id', 'Select Product', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::select('product_id', $productList, null, ['class' => 'form-control', 'placeholder' => 'Select User Group']) }}
                    </div>
                  </div>
                
                <div class="form-group row">
                {{ Form::label('price', 'Unit Price', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="col-sm-10">
                    {{ Form::text('price',null,['class' => 'form-control']) }}
                </div>
                </div> 

                <div class="form-group row">
                    {{ Form::label('quantity', 'Quantity', ['class' => 'col-sm-2 col-form-label']) }}
                    <div class="col-sm-10">
                        {{ Form::text('quantity',null,['class' => 'form-control']) }}
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