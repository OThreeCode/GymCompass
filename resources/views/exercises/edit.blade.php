@extends('layouts.authenticated')

@section('title', 'Cadastrar Exercício')

@section('content')
<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Cadastrar {{ $exercise->name }}</h1>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <form method="post" action="{{ route('exercises.update', ['exercise' => $exercise->id]) }}" class="space-y-8 divide-y divide-gray-200">
                @method('PATCH')
                @csrf
                <div class="pt-8">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Informações
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Informações relevantes para a edição do exercício.
                        </p>
                    </div>
                </div>
                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Nome
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="name" id="name" value="{{ $exercise->name }}" class="@error('name') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('name')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="muscle_group" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Grupo Muscular
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="muscle_group" name="muscle_group" class="@error('muscle_group') border-red-500 @enderror max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option value="">Selecione uma opção...</option>
                                <option value="dorsal" @if($exercise->muscle_group == 'dorsal') selected @endif>
                                    Dorsal
                                </option>
                                <option value="peitoral" @if($exercise->muscle_group == 'peitoral') selected @endif>
                                    Peitoral
                                </option>
                                <option value="quadriceps" @if($exercise->muscle_group == 'quadriceps') selected @endif>
                                    Quadríceps
                                </option>
                                <option value="deltoides" @if($exercise->muscle_group == 'deltoides') selected @endif>
                                    Deltóides
                                </option>
                                <option value="isquiotibiais" @if($exercise->muscle_group == 'isquiotibiais') selected @endif>
                                    Isquiotibiais
                                </option>
                                <option value="biceps" @if($exercise->muscle_group == 'biceps') selected @endif>
                                    Bíceps
                                </option>
                                <option value="triceps" @if($exercise->muscle_group == 'triceps') selected @endif>
                                    Tríceps
                                </option>
                            </select>
                            @error('muscle_group')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="sets" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Séries
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="sets" id="sets" value="{{ $exercise->sets }}" class="@error('sets') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('sets')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="reps" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Repetições
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="reps" id="reps" value="{{ $exercise->reps }}" class="@error('reps') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('reps')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="equipment" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Equipament
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="equipment" id="equipment" value="{{ $exercise->equipment }}" class="@error('equipment') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('equipment')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="/exercises" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Cancelar
                        </a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection