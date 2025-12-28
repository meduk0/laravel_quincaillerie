<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'ref',
        'prod_nom',
        'prix',
        'qte',
        'descr',
        'img_path',
        'kind',
        'cat_id'
    ];
        /*'marq_id',
        'img_id'
        ,*/

    protected $casts = [
        'kind'=>"string",
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }
}
