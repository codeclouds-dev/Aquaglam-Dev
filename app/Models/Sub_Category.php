<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sub_Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'sub_categories';
    protected $fillable = ['cat_id','name'];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'sub_cat_id','id');
    }
       
}
