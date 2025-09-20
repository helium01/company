<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 // Nama tabel
 protected $table = 'products';

 // Kolom yang boleh diisi (mass assignment)
 protected $fillable = [
     'name',
     'description',
     'price',
     'unit',
     'image',
     'is_active',
 ];

 // Casting data
 protected $casts = [
     'price' => 'decimal:2',
     'is_active' => 'boolean',
 ];
 public function prices()
{
    return $this->hasMany(ProductPrice::class);
}
}