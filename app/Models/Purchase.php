<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    protected $fillable = ([
            'code',
            'trx_date',
            'sub_amount',
            'amount_total',
            'discount_amount',
            'total_products',
            'vendor_id'
    ]);

    public function Vendor(){
        return $this->belongsTo(Vendor::class);
    }
    public function PurchaseDetail(){
        return $this->hasMany(PurchaseDetail::class);
    }
}