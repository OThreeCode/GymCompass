<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Workout;
use Exercises;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;

class WorkoutController extends Controller
{
    public function index()
    {
        return view('workouts.index', ['workouts' => Workout::all()]);
    }

    public function create()
    {
        return view('workouts.create', ['exercises' => Exercise::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string'],
            'days'      => ['required'],
            'exercises' => ['required'],
        ]);

        $days = implode('; ', $request->days);

        $workout = Workout::create([
            'name' => $request->name,
            'day'  => $days,
        ]);

        // Relation
        foreach ($request->exercises as $exercise) {
            $workout->exercises()->attach($exercise);
        }

        return redirect()->route('workouts.index');
    }

    public function show(Workout $workout)
    {
        return view('workouts.edit', ['workout' => $workout, 'exercises' => Exercise::all()]);
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'day'  => ['required'],
        ]);

        $exercise->update([
            'name' => $request->name,
            'day'  => $request->day,
        ]);

        return redirect()->route('workouts.index');
    }

    public function delete(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->back()->with('message', 'Exercício deletado com sucesso.');
    }
}
