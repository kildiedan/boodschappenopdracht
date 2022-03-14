<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    use HasFactory;

    protected $fillable = ["name", "price", "number", "subtotal", "category_id"];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
