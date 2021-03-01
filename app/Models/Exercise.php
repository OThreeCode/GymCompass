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
 * @property int $rest
 * @property string $equipment
 *
 * @property-read $workouts
 */
class Exercise extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $guarded = [];

    public function workouts()
    {
        return $this->belongsToMany(Workout::class);
    }
}
