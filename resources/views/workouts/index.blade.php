@extends('layouts.authenticated')

@section('title', 'Treinos')

@section('content')
<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
   <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between">
         <h1 class="text-2xl font-semibold text-gray-900">Treinos</h1>
         <div class="mb-2">
            <a href="workouts/create" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
               Cadastrar Treinos
            </a>
         </div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
         <div class="py-4">
            <div class="flex flex-col">
               <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                           <thead class="bg-gray-50">
                              <tr>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dia
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                          <div class="flex-shrink-0 h-10 w-10">
                                             <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                          </div>
                                          <div class="ml-4">
                                             <div class="text-sm font-medium text-gray-900">
                                                {{ $workout->name }}
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{ $workout->day }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ count($workout->exercises) }}
                                     </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                       <a href="{{ route('workouts.show', ['workout' => $workout->id]) }}"
                                          class="text-green-600 hover:text-green-900">
                                          Editar
                                       </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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
         </div>
      </div>
   </div>
</main>
@endsection