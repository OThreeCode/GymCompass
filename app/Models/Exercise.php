<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $muscle_group
 * @property int $sets
 * @property int $reps
 * @property string $equipment
 */
class Exercise extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $guarded = [];
}
