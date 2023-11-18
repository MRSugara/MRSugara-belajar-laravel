<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $table = 'purchase_details';
    protected $fillable = ([
        'purchase_id',
        'product_id',
        'quantity',
        'amount_total',
    ]);
    public function Purchase(){
         return $this->belongsTo(Purchase::class);
    }
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
