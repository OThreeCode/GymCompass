@extends('layouts.master')

@section('title', 'Login')

@section('content')
   <div class="flex items-center justify-center h-screen">
      <div class="w-1/4 px-6 pt-6 pb-8 mb-4 bg-white shadow-md ">
         <h1 class="mb-1 -mt-2 text-xl font-bold text-center text-gray-700">LOGIN</h1>
         <form method="post" action="{{ route('login') }}">
            @csrf

            @error('not_valid')
               <div>
                  <span class="text-sm text-red-500">Não foi possível fazer o login.</span>
               </div>
            @enderror

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
            <div class="flex items-center justify-between">
               <button
                  class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline" 
                  type="submit"
               >
                  Entrar
               </button>
            </div>

         </form>
      </div>
   </div>
@endsection
