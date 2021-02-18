@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="w-auto text-black bg-white">
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
</div>

@endsection
