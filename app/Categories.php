<?php

namespace App;

class Categories extends SuperModel
{
    //
    protected $fillable = ['name',
                           'slug',
                           'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->hasMany('App\Products');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
