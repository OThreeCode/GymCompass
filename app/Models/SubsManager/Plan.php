<?php

namespace App\Models\SubsManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $payment_method
 * @property int $plan_duration
 */
class Plan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
