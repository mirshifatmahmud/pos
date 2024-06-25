<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index($id){
        $this->data['user'] = User::find($id);
        $this->data['headLine'] = 'Sales Table';
        return view('users.sales.sales',$this->data);
    }
}
