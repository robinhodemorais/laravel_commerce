<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    //Relaciona a imagem com o produto
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    //Lista as categorias do produtos.
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    //cria um atributo do Nome e Descrição
    //quando utiliza o get no inicio e Attributte no final
    //o laravel cria automaticamente.
    public function getNameDescriptionAttribute()
    {
        return $this->name." - ".$this->description;
    }

    //cria um atributo listando as tags
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();

        //separa a listagem das tags por virgula
        return implode(',', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1)->orderBy(DB::raw('RANDOM()'))->limit(3);
    }


}
