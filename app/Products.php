<?php

namespace App;


class Products extends SuperModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable  = ['name',
                            'user_id',
                            'cat_id',
                            'slug',
                            'price',
                            'content',
                            'title_seo',
                            'meta_keyword',
                            'meta_description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Categories');
    }
}
