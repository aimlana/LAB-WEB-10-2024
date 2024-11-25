<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // Tentukan nama tabel sebagai singular
    protected $table = 'category';

    protected $fillable = ['name', 'description'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
