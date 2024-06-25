<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptController extends Controller
{
    public function index($id){
        $this->data['user'] = User::find($id);
        
        return view('users.sales.receipt',$this->data);
    }
}
