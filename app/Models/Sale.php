<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
        protected $table = 'sales';
        protected $fillable = ([
        'code',
        'trx_date',
        'sub_amount',
        'amount_total',
        'discount_amount',
        'total_products',
        'customer_id'
        ]);
            public function Customer(){
            return $this->belongsTo(Customer::class);
            }
            public function SaleDetail(){
                return $this->hasMany(SaleDetail::class);
            }
}
