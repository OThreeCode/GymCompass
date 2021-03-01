<html>
   <head>
      <title>@yield('title')</title>

      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
      @if(Auth::check())
         <div class="h-screen flex overflow-hidden bg-gray-100">
            <div class="md:hidden">
               <div class="fixed inset-0 flex z-40">
                  <div class="fixed inset-0">
                     <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                  </div>
                  <div class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-800">
                     <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                           <span class="sr-only">Fechar menu lateral</span>
                              <!-- Heroicon name: outline/x -->
                              <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                        </button>
                     </div>
                     <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                           <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="GymCompass">
                        </div>
                        <nav class="mt-5 px-2 space-y-1">
                           <a href="/home" class="@if(Request::is('home')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="text-gray-300 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                              Dashboard
                           </a>
         
                           <a href="/users" class="@if(Request::is('users')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="text-gray-400 group-hover:text-gray-300 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                              Usuários
                           </a>

                           <a href="/exercises" class="@if(Request::is('exercises')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="text-gray-400 group-hover:text-gray-300 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                              </svg>
                              Exercícios
                           </a>

                           <a href="/workouts" class="@if(Request::is('workouts')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="text-gray-400 group-hover:text-gray-300 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                              </svg>
                              Treinos
                           </a>
                        </nav>
                     </div>
                     <div class="flex-shrink-0 flex bg-gray-700 p-4">
                        <a href="#" class="flex-shrink-0 group block">
                           <div class="flex items-center">
                              <div>
                                 <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=mXRociLZSv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                              </div>
                              <div class="ml-3">
                                 <p class="text-base font-medium text-white">
                                    {{ Auth::user()->name }}
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="flex-shrink-0 w-14">
                  </div>
               </div>
            </div>
         
            <div class="hidden md:flex md:flex-shrink-0">
               <div class="flex flex-col w-64">
                  <div class="flex flex-col h-0 flex-1 bg-gray-800">
                     <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4">
                           <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="GymCompass">
                        </div>
                        <nav class="mt-5 flex-1 px-2 bg-gray-800 space-y-1">
                           <a href="/home" class="@if(Request::is('home')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                              Dashboard
                           </a>
               
                           <a href="/users" class="@if(Request::is('users')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                              <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                              Usuários
                           </a>

                           <a href="/exercises" class="@if(Request::is('exercises')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                              </svg>
                              Exercícios
                           </a>

                           <a href="/workouts" class="@if(Request::is('workouts')) bg-gray-900 text-white @else text-gray-300 hover:bg-gray-700 hover:text-white @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="text-gray-400 group-hover:text-gray-300 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                              </svg>
                              Treinos
                           </a>
                        </nav>
                     </div>
                     <a href="/logout" class="group rounded-md py-2 px-4 mb-2 flex items-center text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                        <svg class="ml-2 mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sair
                     </a>
                     <div class="flex-shrink-0 flex bg-gray-700 p-4">
                        <a href="#" class="flex-shrink-0 w-full group block">
                           <div class="flex items-center">
                              <div>
                                 <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=mXRociLZSv&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                              </div>
                              <div class="ml-3">
                                 <p class="text-sm font-medium text-white">
                                    {{ Auth::user()->name }}
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
               @yield('content')
            </div>
        </div> 
      @endif
   </body>
</html>
