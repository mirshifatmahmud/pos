<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReceiptController extends Controller
{
    public function index($id){
        $this->data['user'] = User::find($id);
        $this->data['headLine'] = 'Receipts Table';
        return view('users.receipt.receipt',$this->data);
    }

    public function store(Request $request,$id){
        $formData = $request->all();
        $formData['user_id'] = $id;
        $formData['admin_id'] = Auth::user()->id;
        Receipt::create($formData);
        return redirect()->route('receipt',$formData['user_id']); // $id or $formData['user_id']
    }

    /**
     * @param int $id
     * @param int $receipt_id
     */
    public function destroy($id,$receipt_id){
        Receipt::find($receipt_id)->delete();
        
        return redirect()->route('receipt',$id);
    }
}
