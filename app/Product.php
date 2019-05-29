<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','title','slug','specs','details'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function images()
    {
       return $this->hasOne(Image::class);
    }
    
}
