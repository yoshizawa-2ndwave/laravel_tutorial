<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = ['name', 'comment','post_id'];
}
