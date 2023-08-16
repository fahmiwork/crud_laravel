<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProducts extends Model
{
    use HasFactory;
    protected $table = 'kategori_products';
    protected $primaryKey = 'id_kategori';
    public $incrementing = false;
    public $timestamps = true;
}
