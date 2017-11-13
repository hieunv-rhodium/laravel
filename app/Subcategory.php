<?php

namespace App;


class Subcategory extends SuperModel
{
    protected $fillable = ['name', 'category_id'];

    public function category()
    {

        return $this->belongsTo(Categories::class);

    }


}