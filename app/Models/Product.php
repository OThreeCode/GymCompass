<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function plans()
    {
        $this->belongsToMany(Plan::class);
    }
}
