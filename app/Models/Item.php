<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['ReadablePrice'];

    public function getReadablePriceAttribute()
    {
        // $price = $this->price / 10;
        return number_format($this->price,0,',',',');
    }
}
