<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    //Lista as categorias do produtos.
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }
}
