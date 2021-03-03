@extends('layouts.authenticated')

@section('title', 'Home')

@section('content')
<div>
   <div class="pt-1 pl-1 md:hidden sm:pl-3 sm:pt-3">
      <button class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
         <span class="sr-only">Abrir menu lateral</span>
         <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
         </svg>
      </button>
   </div>
   <main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
      <div class="py-6">
         <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
         </div>
         <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <div class="py-4">
               <div class="border-4 border-gray-200 border-dashed rounded-lg h-96"></div>
            </div>
         </div>
      </div>
   </main>
</div>
@endsection
