@extends('layouts.authenticated')

@section('title', 'Usuários')

@section('content')
<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
   <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <h1 class="text-2xl font-semibold text-gray-900">Usuários</h1>
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
                                    Status
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Função
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
                                          <div class="flex-shrink-0 h-10 w-10">
                                             <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                          </div>
                                          <div class="ml-4">
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
                                       <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                          Ativo
                                       </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{ $user->role }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                       <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                          class="text-green-600 hover:text-green-900">
                                          Editar
                                       </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                       <a href="#" class="text-green-600 hover:text-green-900">Deletar</a>
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

{{--<div class="w-auto text-black bg-white">
   <a href="{{ route('logout') }}">Sair</a>
</div>
<div class="flex items-center justify-center h-screen">
   <div class="w-1/4 px-6 pt-6 pb-8 mb-4 bg-white shadow-md ">
      <h1 class="mb-1 -mt-2 text-xl font-bold text-center text-gray-700">ADICIONAR USUÁRIO</h1>
      <form method="post" action="{{ route('users.store') }}">
         @csrf

         <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">
               Nome
            </label>
            <input 
               class="@error('name') border-red-500 @enderror w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearence-none focus:outline-none focus:shadow-outline" 
               name="name" type="text"
            />
            @error('name')
               <div>
                  <small class="text-sm text-red-500">{{ $message }}</small>
               </div>
            @enderror
         </div>

         <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">
               Email
            </label>
            <input 
               class="@error('email') border-red-500 @enderror w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearence-none focus:outline-none focus:shadow-outline" 
               name="email" type="text"
            />
            @error('email')
               <div>
                  <small class="text-sm text-red-500">{{ $message }}</small>
               </div>
            @enderror
         </div>

         <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">
               É um...
            </label>
            <input 
               class="@error('role') border-red-500 @enderror w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearence-none focus:outline-none focus:shadow-outline" 
               name="role" type="text"
            />
            @error('role')
               <div>
                  <small class="text-sm text-red-500">{{ $message }}</small>
               </div>
            @enderror
         </div>

         <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">
               Senha
            </label>
            <input
               class="@error('password') border-red-500 @enderror w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearence-none focus:outline-none focus:shadow-outline" 
               name="password" type="password">
            @error('password')
               <div>
                  <small class="text-sm text-red-500">{{ $message }}</small>
               </div>
            @enderror
         </div>

         <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">
               Confirme a senha
            </label>
            <input
               class="@error('password') border-red-500 @enderror w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearence-none focus:outline-none focus:shadow-outline" 
               name="password_confirmation" type="password">
            @error('password')
               <div>
                  <small class="text-sm text-red-500">{{ $message }}</small>
               </div>
            @enderror
         </div>

         <div class="flex items-center justify-between">
            <button
               class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline" 
               type="submit"
            >
               Enviar
            </button>
         </div>

      </form>
   </div>
</div> --}}