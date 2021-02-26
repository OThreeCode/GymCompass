<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Workout extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
