<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['cat_id','name','sub_cat_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Sub_Category::class,'sub_cat_id','id');
    }

    public function images()
    {
        return $this->belongsTo(Images::class,'id','pro_id');
    }

}
