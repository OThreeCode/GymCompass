<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Repositories\ExerciseRepository;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ExerciseController extends Controller
{
    private ExerciseService $service;
    private ExerciseRepository $repository;

    public function __construct()
    {
        $this->service = new ExerciseService();
        $this->repository = new ExerciseRepository();
    }

    public function index()
    {
        try {
            $exercises = $this->repository->getAll();
            return view('exercises.index', ['exercises' => $exercises]);            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar exercícios.');
        }        
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        try {
            $this->service->save($request->all());
            return redirect()
                ->route('exercises.index')
                ->with('success', 'Exercício cadastrado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha na criação do exercício.');
        }
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.edit', ['exercise' => $exercise]);
    }

    public function update(Request $request, Exercise $exercise)
    {
        try {
            $this->service->update($exercise, $request->all());
            return redirect()
                ->route('exercises.index')
                ->with('success', 'Exercício cadastrado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao atualizar este exercício.');
        }
    }

    public function destroy(Exercise $exercise)
    {
        try {
            $this->service->delete($exercise);
            return redirect()
                ->back()
                ->with('message', 'Exercício deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Não foi possível deletar este exercício.');
        }
    }
}
