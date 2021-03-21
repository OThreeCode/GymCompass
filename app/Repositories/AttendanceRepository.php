<?php

namespace App\Repositories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Collection;

class AttendanceRepository
{
    public function getByUserId(int $id) : Collection
    {
        return Attendance::query()->where('user_id', $id)->get();
    }
}