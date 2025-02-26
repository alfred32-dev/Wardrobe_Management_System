<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothing extends Model
{
    use HasFactory;

    protected $table = 'clothings'; // ✅ Explicitly set the table name

    protected $fillable = ['name', 'category', 'size', 'color', 'brand', 'price', 'image_url', 'outfit'];
}
