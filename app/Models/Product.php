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
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function PurchaseDetail(){
        return $this->hasMany(PurchaseDetail::class);
    }
    public function SaleDetail(){
        return $this->belongsTo(SaleDetail::class);
    }
    public function ProductCirculation(){
        return $this->belongsTo(ProductCirculation::class);
    }
}
