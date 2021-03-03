@extends('layouts.authenticated')

@section('title', 'Treinos')

@section('content')
<main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
   <div class="py-6">
      <div class="flex justify-between px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
         <h1 class="text-2xl font-semibold text-gray-900">Treinos</h1>
         <div class="mb-2">
            <a href="{{ route('workouts.create') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
               Cadastrar Treinos
            </a>
         </div>
      </div>
      <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
         <div class="py-4">
            @if(count($workouts) > 0)
               <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                     <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                           <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                 <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                       Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                       Dias
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                       Número de Exercícios
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                       <span class="sr-only">Editar</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                       <span class="sr-only">Deletar</span>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                 @foreach($workouts as $workout)
                                    <tr>
                                       <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="flex items-center">
                                             <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                   {{ $workout->name }}
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                          {{ $workout->day }}
                                       </td>
                                       <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                          {{ count($workout->exercises) }}
                                       </td>
                                       <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                          <a href="{{ route('workouts.show', ['workout' => $workout->id]) }}"
                                             class="text-green-600 hover:text-green-900">
                                             Editar
                                          </a>
                                       </td>
                                       <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                          <a href="{{ route('workouts.delete', ['workout' => $workout->id]) }}"
                                             class="text-green-600 hover:text-green-900">
                                             Deletar
                                          </a>
                                       </td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                  </div>
                  </div>
               </div>
            @else   
               Nenhum treino cadastrado ainda.
            @endif
         </div>
      </div>
   </div>
</main>
@endsection