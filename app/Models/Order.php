<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'rasa',
        
        'updated_at',
        'created_at',
        // Tambahkan kolom lain yang ingin Anda masukkan ke dalam database order
    ];

    // Definisikan relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
