<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'article_category';

    protected $fillable = [
        'name', 'slug'
    ];    

    protected $dates = ['deleted_at'];
}
