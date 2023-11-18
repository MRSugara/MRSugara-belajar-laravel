<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCirculation extends Model
{
    use HasFactory;
    protected $table = 'product_circulations';
    protected $fillable = ([
            'trx_date',
            'reff',
            'in',
            'out',
            'product_id',
            'remaining_stock',
    ]);
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
