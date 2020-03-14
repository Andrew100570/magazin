<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','id_status','title','description','created_at',
        'updated_at'
];
    //public $timestamps = false;
}
