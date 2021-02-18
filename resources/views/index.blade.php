@extends('layouts.master')

@section('title', 'Index')

@section('content')
<div class="bg-white">
    <div class="relative overflow-hidden">
        <header class="relative">
            <div class="bg-gray-900 pt-6">
                <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <a href="#">
                                <span class="sr-only">Workflow</span>
                                <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-teal-200-cyan-400.svg" alt="">
                            </a>
                            <div class="-mr-2 flex items-center md:hidden">
                                <button type="button" class="bg-gray-900 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" id="main-menu" aria-haspopup="true">
                                    <span class="sr-only">Open main menu</span>
                                    <!-- Heroicon name: outline/menu -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="hidden space-x-8 md:flex md:ml-10">
                            <a href="#" class="text-base font-medium text-white hover:text-gray-300">GymCompass</a>
                        </div>
                    </div>
                    <div class="hidden md:flex md:items-center md:space-x-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                            Entrar
                        </a>
                    </div>
                </nav>
            </div>
        </header>
        <main>
        <div class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                        <div class="lg:py-24">
                            <a href="#" class="inline-flex items-center text-white bg-black rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
                                <span class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gradient-to-r from-green-500 to-green-600 rounded-full">Trabalhe conosco</span>
                                <span class="ml-4 text-sm">Obtenha o GymCompass na sua academia</span>
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="ml-2 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                <span class="block">Uma forma melhor de</span>
                                <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-200 to-green-400 block">conseguir resultados.</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui Lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat.
                            </p>
                            <div class="mt-10 sm:mt-12">
                                <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                                    <div class="sm:flex">
                                        <div class="min-w-0 flex-1">
                                            <label for="email" class="sr-only">Email</label>
                                            <input id="email" type="email" placeholder="Entre seu email" class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 focus:ring-offset-gray-900">
                                        </div>
                                        <div class="mt-3 sm:mt-0 sm:ml-3">
                                            <button type="submit" class="block w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-green-500 to-green-600 text-white font-medium hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 focus:ring-offset-gray-900">Começar teste gratuito</button>
                                        </div>
                                    </div>
                                    <p class="mt-3 text-sm text-gray-300 sm:mt-4">Experimente grátis por 14 dias. Sujeito aos <a href="#" class="font-medium text-white">termos de serviço</a>.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                        <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                            <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                            <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/cloud-illustration-teal-cyan.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        <footer class="bg-gray-50" aria-labelledby="footerHeading">
            <h2 id="footerHeading" class="sr-only">Footer</h2>
            <div class="max-w-md mx-auto pt-12 px-4 sm:max-w-7xl sm:px-6 lg:pt-16 lg:px-8">
                <div class="mt-12 border-t border-gray-200 py-8">
                    <p class="text-base text-gray-400 xl:text-center">
                        &copy; 2021 GymCompass.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
