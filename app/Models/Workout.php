<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 *
 * @property-read $exercises
 * @property-read $users
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
        return $this->belongsToMany(User::class);
    }

    public function formatDays()
    {
        $translatedDays = [
            "monday"    => "segunda-feira",
            "tuesday"   => "terça-feira",
            "wednesday" => "quarta-feira",
            "thursday"  => "quinta-feira",
            "friday"    => "sexta-feira",
        ];

        $days = collect(explode(';', $this->day));

        $days = $days->reduce(function ($carry, $day) use ($translatedDays) {
            return $carry . $translatedDays[trim($day)] . ", ";
        });

        return rtrim($days, ", ");
    }
}
