<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id_status','title','description','created_at',
        'updated_at'
];
    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo('App\Status','id_status');
    }
}
