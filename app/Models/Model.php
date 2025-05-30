<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends EloquentModel
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'maker_id',
    ];
}
