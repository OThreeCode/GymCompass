<?php

namespace App\Models\SubsManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $singer
 * @property string $album
 * @property string $genre
 * @property float $duration
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
