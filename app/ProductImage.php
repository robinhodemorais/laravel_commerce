<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable = [
        'product_id',
        'extension'
    ];

    public function product()
    {
        //relaciona o produto com a imagem
        return $this->belongsTo('CodeCommerce\Product');
    }
}
