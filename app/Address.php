<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'reference',
        'user_id',
        'zip_code',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'country',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }
}
