<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\LibraryPlanRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private UserService $service;
    private UserRepository $repository;

    // Plan
    private LibraryPlanRepository $planRepository;

    public function __construct()
    {
        $this->service = new UserService();
        $this->repository = new UserRepository();
        $this->planRepository = new LibraryPlanRepository();
    }

    public function index()
    {
        try {
            $users = $this->service->getAll();
            return view('users.index', ['users' => $users]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar usuários.');
        }
    }

    public function create()
    {
        try {
            return view('users.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar treinos.');
        }
    }

    public function show(User $user)
    {
        try {
            $plans = $this->planRepository->getAll();
            return view('users.edit', [
                'user' => $user,
                'plans' => $plans ?? null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao recuperar dados.');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->service->save($request->all());
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuário cadastrado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha na criação do usuário.');
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $this->service->update($user, $request->all());
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuário atualizado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Falha ao atualizar usuário.');
        }
    }

    public function destroy(User $user)
    {
        try {
            $this->service->delete($user);
            return redirect()
                ->back()
                ->with('message', 'Usuário deletado com sucesso.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Não foi possível deletar este usuário.');
        }
    }
}
