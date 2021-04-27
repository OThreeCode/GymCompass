<?php

namespace App\Models;

use App\Models\SubsManager\Plan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * @property int $id
 * @property int $personal_id
 * @property int $plan_id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read $workouts
 * @property-read $personal
 * @property-read $clients
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_ADMIN    = 'Admin';
    const ROLE_PERSONAL = 'Personal';
    const ROLE_CLIENT   = 'Client';

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function changePassword($new)
    {
        $this->password = Hash::make($new);

        return $this;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
}
