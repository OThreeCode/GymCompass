@extends('layouts.authenticated')

@section('title', 'Home')

@section('content')
<div>
   <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
      <button class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
         <span class="sr-only">Abrir menu lateral</span>
         <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
         </svg>
      </button>
   </div>
   <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
      <div class="py-6">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
         </div>
         <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
               <div class="border-4 border-dashed border-gray-200 rounded-lg h-96"></div>
            </div>
         </div>
      </div>
   </main>
</div>


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
</div>

<div class="flex items-center justify-center h-screen">
   <div class="w-1/4 px-6 pt-6 pb-8 mb-4 bg-white shadow-md ">
      <h1 class="mb-1 -mt-2 text-xl font-bold text-center text-gray-700">GERENCIAR USUÁRIOS</h1>
      @if($users->isNotEmpty())
      <table>
         <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Função</th>
            <th>Ações</th>
         </tr>
         @foreach($users as $user)
         <tr>
            <td>
               {{ $user->name }}
            </td>
            <td>
               {{ $user->email }}
            </td>
            <td>
               {{ $user->role }}
            </td>
            <td>
               <a href="{{ route('users.edit', ['user' => $user]) }}">Editar</a>
               @if($user->role != 'Admin')
               <a href="{{ route('users.delete', ['user' => $user]) }}">Remover</a>
               @endif
            </td>
         </tr>
         @endforeach
      </table>
      @else
         <div class="text-red-500">
            Nenhum usuário cadastrado.
         </div>
      @endif
   </div>
</div> --}}

@endsection
