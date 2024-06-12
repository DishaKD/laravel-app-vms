<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_title',
        'product_sku',
        'category',
        'quantity',
        'order_from',
        'order_by',
        'contact_info',
        'special_instructions',
        'status'
    ];
}
