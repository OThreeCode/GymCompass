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
        return view('workouts.create', ['exercises' => Exercise::all()]);
    }

    public function show(Workout $workout)
    {
        return view('workouts.edit', [
            'workout'            => $workout,
            'exercises'          => Exercise::all(),
            'selected_exercises' => $workout->exercises()->get(),
        ]);
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

    public function update(Request $request, Workout $workout)
    {
        $request->validate([
            'name'      => ['required', 'string'],
            'days'      => ['required'],
            'exercises' => ['required'],
        ]);

        $days = implode('; ', $request->days);

        $workout->update([
            'name' => $request->name,
            'day'  => $days,
        ]);

        // Relation
        $workout->exercises()->detach();
        foreach ($request->exercises as $exercise) {
            $workout->exercises()->attach($exercise);
        }

        return redirect()->route('workouts.index');
    }

    public function delete(Workout $workout)
    {
        $workout->delete();

        return redirect()->back()->with('message', 'Treino deletado com sucesso.');
    }
}
