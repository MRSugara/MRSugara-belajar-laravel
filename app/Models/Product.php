<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'product_code',
        'description',
        'price',
        'unit',
        'stock',
        'image'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class);
    }
    public function saleDetails(){
        return $this->belongsTo(SaleDetail::class);
    }
    public function oroductCirculation(){
        return $this->belongsTo(ProductCirculation::class);
    }
}
