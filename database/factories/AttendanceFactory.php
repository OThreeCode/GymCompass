<?php

namespace Database\Factories;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        $inDate = new Carbon($this->faker->dateTimeThisYear('now'));
        $outDate = $inDate->clone();

        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 28),
            'time_in' => $inDate->format('Y-m-d H:i:s'),
            'time_out' => $outDate->addHours($this->faker->numberBetween(1, 3))->format('Y-m-d H:i:s')
        ];
    }
}
