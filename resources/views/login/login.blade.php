@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
   <div class="sm:mx-auto sm:w-full sm:max-w-md">
     <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
       Entre na sua conta
     </h2>
   </div>
 
   <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
     <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
       <form class="space-y-6" action="#" method="POST">
         <div>
           <label for="email" class="block text-sm font-medium text-gray-700">
             Email
           </label>
           <div class="mt-1">
             <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
           </div>
         </div>
 
         <div>
           <label for="password" class="block text-sm font-medium text-gray-700">
             Senha
           </label>
           <div class="mt-1">
             <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
           </div>
         </div>
 
         <div class="flex items-center justify-between">
           <div class="text-sm">
             <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
               Esqueceu sua senha?
             </a>
           </div>
         </div>
 
         <div>
           <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
             Entrar
           </button>
         </div>
       </form>
     </div>
   </div>
 </div>

{{--
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
--}}
@endsection
