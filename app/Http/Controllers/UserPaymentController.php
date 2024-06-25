<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentController extends Controller
{
    public function index($id){
        $this->data['user'] = User::find($id);
        $this->data['headLine'] = 'Payments Table';
        return view('users.payment.payment',$this->data);
    }

    public function store(Request $request,$id){
        $formData = $request->all();
        $formData['user_id'] = $id;
        $formData['admin_id'] = Auth::user()->id;
        Payment::create($formData);
        return redirect()->route('payment',$formData['user_id']); // $id or $formData['user_id']
    }

    /**
     * @param int $id
     * @param int $payment_id
     */
    public function destroy($id,$payment_id){
        Payment::find($payment_id)->delete();
        return redirect()->route('payment',$id);
    }
}
