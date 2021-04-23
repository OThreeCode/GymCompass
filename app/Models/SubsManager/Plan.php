<?php

namespace App\Models\SubsManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $payment_method
 * @property int $duration
 * @property Carbon $due_date
 */
class Plan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    // Payment Types
    const PAYMENTS_ALLOWED = ['Credit', 'Debit', 'Slip', 'Google Pay', 'Apple Pay'];

    // Plan Duration
    const PLANS_DURATION = ['Monthly', 'Semiannual', 'Annual'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
