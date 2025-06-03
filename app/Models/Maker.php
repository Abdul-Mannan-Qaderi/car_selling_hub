<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maker extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function cars():HasMany
    {
        return $this->hasMany(Maker::class);
    }

    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }
}
