@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
   <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
         Entre na sua conta
      </h2>
   </div>
 
   <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
         <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            
            @error('not_valid')
               <div>
                  <span class="text-sm text-red-500">Não foi possível fazer o login.</span>
               </div>
            @enderror
         
            <div>
               <label for="email" class="block text-sm font-medium text-gray-700">
                  Email
               </label>
               <div class="mt-1">
                  <input id="email" name="email" type="email" autocomplete="email" required class="@error('password') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                  @error('email')
                     <div>
                        <small class="text-sm text-red-500">{{ $message }}</small>
                     </div>
                  @enderror
               </div>
            </div>

            <div>
               <label for="password" class="block text-sm font-medium text-gray-700">
                  Senha
               </label>
               <div class="mt-1">
                  <input id="password" name="password" type="password" required class="@error('password') border-red-500 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                  @error('password')
                     <div>
                        <small class="text-sm text-red-500">{{ $message }}</small>
                     </div>
                  @enderror
               </div>
            </div>

            <div class="flex items-center justify-between">
               <div class="text-sm">
                  <a href="#" class="font-medium text-green-600 hover:text-green-500">
                     Esqueceu sua senha?
                  </a>
               </div>
            </div>

            <div>
               <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Entrar
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
