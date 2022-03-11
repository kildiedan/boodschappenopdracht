<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Grocery extends Model
{
    // use Hasfactory;

    protected $gaurded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
