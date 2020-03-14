<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name','id_task','description','created_at',
        'updated_at'
];
    public $timestamps = false;
}
