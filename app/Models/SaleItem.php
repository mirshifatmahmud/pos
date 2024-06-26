<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','price','quantity','total','sale_invoice_id'];

    public function sales(){
        return $this->belongsTo(SaleInvoice::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
