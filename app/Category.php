<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    //relaciona o produto com a categoria
    public function products()
    {
        return $this->hasMany('CodeCommerce\Product');
    }
}
