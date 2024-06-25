<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
use App\Models\SaleInvoice;
use App\Models\Payment;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['group_name','name','email','phone','address'];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function sales(){
        return $this->hasMany(SaleInvoice::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    public function purchase(){
        return $this->hasMany(PurchaseInvoice::class);
    }

    public function receipt(){
        return $this->hasMany(Payment::class);
    }

}
