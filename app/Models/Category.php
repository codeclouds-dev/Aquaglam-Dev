<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['name'];

    public function subcategories()
    {
        return $this->hasMany(Sub_category::class,'cat_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'cat_id','id');
    }

    
    
}
