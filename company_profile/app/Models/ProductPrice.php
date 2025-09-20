<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'product_id', 'type', 'ukuran', 'isi_pcs', 'harga_ikat', 'harga_karung'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}