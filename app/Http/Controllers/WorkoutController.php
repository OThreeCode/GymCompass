<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        return view('workouts.index', ['workouts' => Workout::all()]);
    }

    public function create()
    {
        $exercises = Exercise::all();
        return view('workouts.create', ['exercises' => $exercises]);
        // return view('workouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'day'  => ['required'],
        ]);

        Exercise::create([
            'name' => $request->name,
            'day'  => $request->day,
        ]);

        return redirect()->route('workouts.index');
    }

    public function show(Workout $workout)
    {
        return view('workouts.edit', ['workouts' => $workout]);
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
