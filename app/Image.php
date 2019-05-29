<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['product_id','category_id','path'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
