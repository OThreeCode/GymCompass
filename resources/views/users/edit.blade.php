@extends('layouts.authenticated')

@section('title', 'Editar Usuário')

@section('content')
<main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
    <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
           <h1 class="text-2xl font-semibold text-gray-900">Editar {{ $user->name }}</h1>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <form id="workoutForm" method="post" action="{{ route('users.update', ['user' => $user->id]) }}" onsubmit="sendWorkouts()" class="space-y-8 divide-y divide-gray-200">
                @method('PATCH')
                @csrf
                <div class="pt-8">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Informações Pessoais
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Informações relevantes para edição do usuário.
                        </p>
                    </div>
                </div>
                <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Nome
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="@error('name') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
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
                            <input id="email" name="email" type="email" value="{{ $user->email }}" class="@error('email') border-red-500 @enderror max-w-lg block w-full shadow-sm focus:ring-green-500 focus:border-green-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
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
                                <option value="Admin" @if($user->role === "Admin") selected @endif>
                                    Administrador(a)
                                </option>
                                <option value="Personal" @if($user->role === "Personal") selected @endif>
                                    Personal Trainer
                                </option>
                                <option value="Client" @if($user->role === "Client") selected @endif>
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

                    @if($user->role === "Client")
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="personal" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Personal Trainer
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select id="personal" name="personal" class="@error('personal') border-red-500 @enderror max-w-lg block focus:ring-green-500 focus:border-green-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Selecione um personal</option>
                                    @foreach($personals as $personal)
                                        <option value="{{ $personal->id }}" @if($user->personal_id === $personal->id) selected @endif>{{ $personal->name }}</option>
                                    @endforeach
                                </select>
                                @error('personal')
                                    <div>
                                        <small class="text-sm text-red-500">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Selecione os treinos
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div id="workouts" class="grid grid-cols-3 gap-4 auto-cols-max"></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Treinos selecionados
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div id="selectedWorkouts" class="grid grid-cols-3 gap-4 auto-cols-max"></div>
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
    let workouts         = @json($workouts);
    let selectedWorkouts = @json($selected_workouts) ?? [];

    window.onload = function () {
        this.render();
    };

    function render() {
        this.renderSelectedWorkouts();
        this.renderWorkouts();
    }

    function renderWorkouts() {
        document.getElementById('workouts').innerHTML = "";
        workouts.forEach(workout => {
            if(!selectedWorkouts.some(w => w.id === workout.id)) {
                let workoutDiv = document.createElement('div');
                workoutDiv.innerHTML = `
                    <div class="inline w-1/5 p-2 bg-white shadow rounded-l-md h-9">
                        ${workout.name}
                    </div>
                    <button type="button" onclick="addWorkout(${workout.id})" class="w-8 text-white bg-green-600 rounded-r-md h-9">+</button>
                `;
                document.getElementById('workouts').appendChild(workoutDiv);
            }
        });
    }

    function renderSelectedWorkouts() {
        document.getElementById('selectedWorkouts').innerHTML = "";
        selectedWorkouts.forEach(workout => {
            let selectedDiv = document.createElement('div');
            selectedDiv.innerHTML = `
                <div class="inline w-1/5 p-2 bg-white shadow rounded-l-md h-9">
                    ${workout.name}
                </div>
                <button type="button" onclick="removeWorkout(${workout.id})" class="w-8 text-white bg-red-600 rounded-r-md h-9">-</button>
            `;
            document.getElementById('selectedWorkouts').appendChild(selectedDiv);
        });
    }
    
    function addWorkout(workoutId) {
        if(!selectedWorkouts.some(w => w.id === workoutId)) {
            workout = workouts.find(work => work.id === workoutId);
            selectedWorkouts.push(workout);
        }
        this.render();
    }

    function removeWorkout(workoutId) {
        selectedWorkouts = selectedWorkouts.filter(e => e.id !== workoutId);
        this.render();
    }

    function sendWorkouts() {
        selectedWorkouts.forEach(workout => {
            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "workouts[]");
            input.setAttribute("value", workout.id);

            document.getElementById('workoutForm').appendChild(input);
        })
    }
</script>
@endsection