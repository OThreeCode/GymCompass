<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Exercises;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return view('exercises.index', ['exercises' => Exercise::all()]);
    }

    public function store(Request $request)
    {
    }

    public function show(Exercise $exercise)
    {
    }

    public function update(Request $request, Exercise $exercise)
    {
    }

    public function delete(Exercise $exercise)
    {
    }
}
