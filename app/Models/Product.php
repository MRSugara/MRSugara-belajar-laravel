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
}
