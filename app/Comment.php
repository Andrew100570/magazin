<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Comment extends Model
{
    protected $fillable = ['name','id_task','description','created_at',
        'updated_at'
];
    public $timestamps = false;

    public function task()
    {
        return $this->belongsTo('App\Task','id_task');
    }
}
