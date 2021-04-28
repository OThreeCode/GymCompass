<?php

namespace App\Http\Controllers;

use App\Models\SubsManager\Plan;
use App\Models\SubsManager\Product;
use App\Repositories\GymPlanRepository;
use App\Services\GymPlanService;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private GymPlanService $service;
    private GymPlanRepository $repository;

    public function __construct()
    {
        $this->service = new GymPlanService();
        $this->repository = new GymPlanRepository();
    }

    public function index()
    {
        try {
            $plans = $this->service->getAll();
            return view('submanager.plan.index', [
                'plans' => $plans ?? null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar planos.');
        }
    }

    public function create()
    {
        try {
            $products = Product::all();
            return view('submanager.plan.create', [
                'products' => $products ?? null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar planos.');
        }
    }

    public function show(Plan $plan)
    {
        try {
            return view('submanager.plan.edit', [
                'plan' => $plan,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar planos.');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->service->save($request->all());
            return redirect()
                ->route('plans.index')
                ->with('success', 'Plano cadastrado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha na criação do plano.');
        }
    }

    public function update(Request $request, Plan $plan)
    {
        try {
            $this->service->update($plan, $request->all());
            return redirect()
                ->route('plans.index')
                ->with('success', 'Plano atualizado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao atualizar plano.');
        }
    }

    public function destroy(Plan $plan)
    {
        try {
            $this->service->delete($plan);
            return redirect()
                ->back()
                ->with('message', 'Plano deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Não foi possível deletar este plano.');
        }
    }
}
