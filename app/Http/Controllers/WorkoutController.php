<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Repositories\ExerciseRepository;
use App\Repositories\WorkoutRepository;
use App\Services\WorkoutService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WorkoutController extends Controller
{
    private WorkoutService $service;
    private WorkoutRepository $repository;
    private ExerciseRepository $exerciseRepository;

    public function __construct()
    {
        $this->service = new WorkoutService();
        $this->repository = new WorkoutRepository();
        $this->exerciseRepository = new ExerciseRepository();
    }

    public function index()
    {
        try {
            $workouts = $this->repository->getAll();
            return view('workouts.index', ['workouts' => $workouts]);            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar treinos.');
        }
    }

    public function create()
    {
        try {
            $exercises = $this->exerciseRepository->getAll();
            return view('workouts.create', ['exercises' => $exercises]);            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar exercícios.');
        }
    }

    public function show(Workout $workout)
    {
        try {
            $exercises = $this->exerciseRepository->getAll();
            return view('workouts.edit', [
                'workout'            => $workout,
                'exercises'          => $exercises,
                'selected_exercises' => $workout->exercises()->get(),
            ]);            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar exercícios.');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->service->save($request->all());
            return redirect()
                ->route('workouts.index')
                ->with('success', 'Treino cadastrado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha na criação do treino.');
        }
    }

    public function update(Request $request, Workout $workout)
    {
        try {
            $this->service->update($workout, $request->all());
            return redirect()
                ->route('workouts.index')
                ->with('success', 'Treino atualizado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha na criação do treino.');
        }
    }

    public function destroy(Workout $workout)
    {
        try {
            $this->service->delete($workout);
            return redirect()
                ->back()
                ->with('message', 'Treino deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Não foi possível deletar este treino.');
        }
    }
}
