<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return view('exercises.index', ['exercises' => Exercise::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => ['required', 'string'],
            'muscle_group' => ['required'],
            'sets'         => ['required', 'integer'],
            'reps'         => ['required', 'integer'],
            'equipment'    => ['required', 'string'],
        ]);

        Exercise::create([
            'name'         => $request->name,
            'muscle_group' => $request->muscle_group,
            'sets'         => $request->sets,
            'reps'         => $request->reps,
            'equipment'    => $request->equipment,
        ]);

        return redirect()->route('exercises.index');
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.edit', ['exercise' => $exercise]);
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name'         => ['required', 'string'],
            'muscle_group' => ['required'],
            'sets'         => ['required', 'integer'],
            'reps'         => ['required', 'integer'],
            'equipment'    => ['required', 'string'],
        ]);

        $exercise->update([
            'name'         => $request->name,
            'muscle_group' => $request->muscle_group,
            'sets'         => $request->sets,
            'reps'         => $request->reps,
            'equipment'    => $request->equipment,
        ]);

        return redirect()->route('exercises.index');
    }

    public function delete(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->back()->with('message', 'Exercício deletado com sucesso.');
    }
}