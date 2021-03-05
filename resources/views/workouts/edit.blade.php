@extends('layouts.authenticated')

@section('title', 'Editar Treino')

@section('content')
<main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
    <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
           <h1 class="text-2xl font-semibold text-gray-900">Editar Treino</h1>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <form id="workoutForm" method="post" action="{{ route('workouts.update', ['workout' => $workout->id]) }}" onsubmit="sendExercises()" class="space-y-8 divide-y divide-gray-200">
                @method('PATCH')
                @csrf
                <div class="pt-8">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Informações Pessoais
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Informações relevantes para edição do treino.
                        </p>
                    </div>
                </div>
                <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Nome
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="name" id="name" value="{{ $workout->name }}" class="@error('name') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            @error('name')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="days" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Dias
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div>
                                <input type="checkbox" name='days[]'
                                @if(in_array('monday', explode('; ', $workout->day))) checked @endif
                                class="inline-block mx-2 text-green-600 rounded-md" value='monday' />
                                Segunda-Feira
                            </div>
                            <div>
                                <input type="checkbox" name='days[]'
                                @if(in_array('tuesday', explode('; ', $workout->day))) checked @endif
                                class="inline-block mx-2 text-green-600 rounded-md" value='tuesday' />
                                Terça-Feira
                            </div>
                            <div>
                                <input type="checkbox" name='days[]'
                                @if(in_array('wednesday', explode('; ', $workout->day))) checked @endif
                                class="inline-block mx-2 text-green-600 rounded-md" value='wednesday' />
                                Quarta-Feira
                            </div>
                            <div>
                                <input type="checkbox" name='days[]'
                                @if(in_array('thursday', explode('; ', $workout->day))) checked @endif
                                class="inline-block mx-2 text-green-600 rounded-md" value='thursday' />
                                Quinta-Feira
                            </div>
                            <div>
                                <input type="checkbox" name='days[]'
                                @if(in_array('friday', explode('; ', $workout->day))) checked @endif
                                class="inline-block mx-2 text-green-600 rounded-md" value='friday' />
                                Sexta-Feira
                            </div>
                            @error('days')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Exercícios
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div id="exercises" class="grid grid-cols-3 gap-4 auto-cols-max"></div>
                            @error('exercises')
                                <div>
                                    <small class="text-sm text-red-500">{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="days" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Exercícios selecionados
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div id="selectedExercises" class="grid grid-cols-3 gap-4 auto-cols-max"></div>
                        </div>
                    </div>
                </div>
            
                <div class="pt-5">
                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script type="text/javascript">
    let exercises         = @json($exercises);
    let selectedExercises = @json($selected_exercises) ?? [];

    window.onload = function () {
        this.render();
    };

    function render() {
        this.renderSelectedExercises();
        this.renderExercises();
    }

    function renderExercises() {
        document.getElementById('exercises').innerHTML = "";
        exercises.forEach(exercise => {
            if(!selectedExercises.some(e => e.id === exercise.id)) {
                let exerciseDiv = document.createElement('div');
                exerciseDiv.innerHTML = `
                    <div class="inline w-1/5 p-2 bg-white shadow rounded-l-md h-9">
                        ${exercise.name} (${exercise.sets}x${exercise.reps})
                    </div>
                    <button type="button" onclick="addExercises(${exercise.id})" class="w-8 text-white bg-green-600 rounded-r-md h-9">+</button>
                `;
                document.getElementById('exercises').appendChild(exerciseDiv);
            }
        });
    }

    function renderSelectedExercises() {
        document.getElementById('selectedExercises').innerHTML = "";
        selectedExercises.forEach(exercise => {
            let selectedDiv = document.createElement('div');
            selectedDiv.innerHTML = `
                <div class="inline w-1/5 p-2 bg-white shadow rounded-l-md h-9">
                    ${exercise.name} (${exercise.sets}x${exercise.reps})
                </div>
                <button type="button" onclick="removeExercise(${exercise.id})" class="w-8 text-white bg-red-600 rounded-r-md h-9">-</button>
            `;
            document.getElementById('selectedExercises').appendChild(selectedDiv);
        });
    }

    function addExercises(exerciseId){
        if(!selectedExercises.some(e => e.id === exerciseId)) {
            exercise = exercises.find(exer => exer.id === exerciseId);
            selectedExercises.push(exercise);
        }
        this.render();
    }

    function removeExercise(exerciseId) {
        selectedExercises = selectedExercises.filter(e => e.id !== exerciseId);
        this.render();
    }

    function sendExercises() {
        selectedExercises.forEach(exercise => {
            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "exercises[]");
            input.setAttribute("value", exercise.id);

            document.getElementById('workoutForm').appendChild(input);
        })
    }
</script>
@endsection