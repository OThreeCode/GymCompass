<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property Carbon $time_in
 * @property Carbon $time_out
 */
class Attendance extends Model
{
    use HasFactory;

    public $timestamps = false;
}
