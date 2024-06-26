<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller
{
    public function index($id){
        $this->data['user'] = User::find($id);
        $this->data['headLine'] = 'Sales Table';
        return view('users.sales.sales',$this->data);
    }

    public function createInvoice(Request $request,$id){
        $formData = $request->all();
        $formData['user_id'] = $id;
        $formData['admin_id'] = Auth::user()->id;
        SaleInvoice::create($formData);
        return redirect()->route('user.sales',$formData['user_id']);
    }

    public function invoice($id,$sale_id){
        $this->data['user'] = User::find($id);
        $this->data['invoice'] = SaleInvoice::find($sale_id);
        $this->data['productList'] = Product::arrayForProductList();
        
        $this->data['headLine'] = 'Sales Invoice';
        return view('users.sales.sales-invoice',$this->data);
    }

    public function addItem(Request $request,$id,$invoice_id){
        $formData = $request->all();
        $formData['sale_invoice_id'] = $invoice_id;
        $price = $formData['price'];
        $quantity = $formData['quantity'];
        $formData['total'] = $price * $quantity;
        SaleItem::create($formData);
        return redirect()->route('user.sales.invoice-details',['id'=>$id,'invoice_id'=>$invoice_id]);

        
    }

    public function destroy_item($id,$invoice_id,$item_id){
        SaleItem::find($item_id)->delete();
        return redirect()->route('user.sales.invoice-details',['id'=>$id,'invoice_id'=>$invoice_id]);
    }


    public function destroy($id,$sale_id){
        SaleInvoice::find($sale_id)->delete();
        return redirect()->route('user.sales',$id);
    }
}
