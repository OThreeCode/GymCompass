@extends('layouts.authenticated')

@section('title', 'Usuários')

@section('content')
<main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
   <div class="py-6">
      <div class="flex justify-between px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
         <h1 class="text-2xl font-semibold text-gray-900">Usuários</h1>
         <div class="mb-2">
            <a href="{{ route('users.create') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
               Cadastrar Usuários
            </a>
         </div>
      </div>
      <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
         <div class="py-4">
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
                                    Status
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Função
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Treinos
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Personal
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
                              @foreach($users as $user)
                                 <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                       <div class="flex items-center">
                                          <div>
                                             <div class="text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                             </div>
                                             <div class="text-sm text-gray-500">
                                                {{ $user->email }}
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                       <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                          Ativo
                                       </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                       {{ $user->role }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                       {{ $user->workouts->isEmpty() ? 'Nenhum' : count($user->workouts) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                       {{ $user->personal_name ?? '--' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                       <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                          class="text-green-600 hover:text-green-900">
                                          Editar
                                       </a>
                                    </td>
                                    @if(!($user->id === Auth::user()->id))
                                       <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                          <x-delete-modal route='users.destroy' model='user' id='{{ $user->id }}' />
                                       </td>
                                    @else
                                       <td></td>
                                    @endif
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
