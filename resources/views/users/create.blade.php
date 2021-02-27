@extends('layouts.authenticated')

@section('title', 'Cadastrar Usuário')

@section('content')
<main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
    <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
           <h1 class="text-2xl font-semibold text-gray-900">Cadastrar Usuário</h1>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <form method="post" action="{{ route('users.store') }}" class="space-y-8 divide-y divide-gray-200">
                @csrf
                <div class="pt-8">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Informações Pessoais
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Informações relevantes para criar um novo usuário.
                        </p>
                    </div>
                </div>
                <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Nome
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="name" id="name" class="@error('name') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('name')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Email
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input id="email" name="email" type="email" class="@error('email') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('email')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="role" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Função
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="role" name="role" class="@error('role') border-red-500 @enderror max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option value="">Selecione uma opção...</option>
                                <option value="Admin">
                                    Administrador(a)
                                </option>
                                <option value="Personal">
                                    Personal Trainer
                                </option>
                                <option value="Client">
                                    Aluno(a)
                                </option>
                            </select>
                            @error('role')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="workouts" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Treinos
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select multiple="multiple" id="workouts" name="workouts[]" class="@error('workouts') border-red-500 @enderror block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm">
                                @foreach($workouts as $workout)
                                    <option value="{{ $workout->id }}">
                                        {{ $workout->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('workouts')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Senha
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="password" name="password" id="password" class="@error('password') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('password')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Confirmação de senha
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="@error('password_confirmation') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('password_confirmation')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Cadastrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection