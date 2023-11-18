<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
        protected $table = 'sale_details';
        protected $fillable = ([
        'sale_id',
        'product_id',
        'quantity',
        'amount_total',
        ]);
        public function Sale(){
            return $this->belongsTo(Sale::class);
        }
        public function Product(){
            return $this->belongsTo(Product::class);
        }
}
