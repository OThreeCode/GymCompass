@extends('layouts.authenticated')

@section('title', 'Home')

@section('scripts')
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
@endsection

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
					@if(!is_null($users))
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
												<span class="sr-only">Info</span>
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
													<a href="{{ route('users.info', ['user' => $user->id]) }}"
													class="text-green-600 hover:text-green-900">
													Info
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
							</div>
						</div>
					@else
					<div class="p-20 flex justify-center">
						<div class="flex max-w-md flex-col gap-5">
							<div class="rounded-lg bg-white overflow-hidden shadow-lg">
								<div class="px-6 py-5">
									<div class="font-bold text-center text-gray-800 text-xl mb-2">Frequência no mês de Março</div>
									<p class="text-gray-700 text-center font-medium text-9xl text-gray-800">
										75<span class="inline-block text-5xl align-baseline">%</span>
									</p>
								</div>
								<div class="px-6 pt-1 pb-4">
									<p class="inline-block text-sm font-normal text-gray-400">* Contando apenas os dias de treino</p>
								</div>
							</div>
							<div class="max-w-sm h-auto rounded-lg bg-white overflow-hidden shadow-lg">
								<div class="flex flex-col px-6 py-5 justify-items-center justify-center">
									<div class="font-bold text-center text-gray-800 text-xl mb-2">Frequência nos últimos meses</div>
									<table class="overflow-auto mt-5 w-full text-2xl bg-gray-800 rounded-md">
										<tbody class="text-white">
											<tr class="flex justify-between p-3 border-b border-gray-200">
												<td>Outubro</td>
												<td><span class="text-green-300">87%</span></td>
											</tr>
											<tr class="flex justify-between bg-gray-700 p-3 border-b border-gray-200">
												<td>Novembro</td>
												<td><span class="text-yellow-300">60%</span></td>
											</tr>
											<tr class="flex justify-between p-3 border-b border-gray-200">
												<td>Dezembro</td>
												<td><span class="text-yellow-300">57%</span></td>
											</tr>
											<tr class="flex justify-between bg-gray-700 p-3 border-b border-gray-200">
												<td>Janeiro</td>
												<td><span class="text-green-300">96%</span></td>
											</tr>
											<tr class="flex justify-between p-3 border-b border-gray-200">
												<td>Fevereiro</td>
												<td><span class="text-red-300">30%</span></td>
											</tr>
											

										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="flex-1 ml-8 max-w-sm h-96 max-h-screen rounded-lg bg-white overflow-hidden shadow-lg">
							<div class="px-6 py-5">
								<div class="font-bold text-center text-gray-800 text-xl mb-2">Grupos musculares mais treinados</div>
								<div class="px-3 mt-4">
									<span class="inline-block bg-gray-200 rounded-full px-4 py-2 text-md font-semibold text-gray-700 mr-2 mb-2">quadríceps</span>
									<span class="inline-block bg-gray-200 rounded-full px-4 py-2 text-md font-semibold text-gray-700 mr-2 mb-2">bíceps</span>
									<span class="inline-block bg-gray-200 rounded-full px-4 py-2 text-md font-semibold text-gray-700 mr-2 mb-2">dorsal</span>
									<span class="inline-block bg-gray-200 rounded-full px-4 py-2 text-md font-semibold text-gray-700 mr-2 mb-2">tríceps</span>
									<span class="inline-block bg-gray-200 rounded-full px-4 py-2 text-md font-semibold text-gray-700 mr-2 mb-2">panturrilha</span>
								</div>
							</div>
							<div class="px-6 pb-5">
								<div class="font-bold text-center text-gray-800 text-xl mb-2">Exercícios mais executados</div>
								<div class="px-3 mt-4">
									<span class="inline-block bg-gray-700 rounded-full px-4 py-2 text-md font-semibold text-gray-200 mr-2 mb-2">legpress</span>
									<span class="inline-block bg-gray-700 rounded-full px-4 py-2 text-md font-semibold text-gray-200 mr-2 mb-2">extensora</span>
									<span class="inline-block bg-gray-700 rounded-full px-4 py-2 text-md font-semibold text-gray-200 mr-2 mb-2">flexora</span>
									<span class="inline-block bg-gray-700 rounded-full px-4 py-2 text-md font-semibold text-gray-200 mr-2 mb-2">cross-over</span>
									<span class="inline-block bg-gray-700 rounded-full px-4 py-2 text-md font-semibold text-gray-200 mr-2 mb-2">supino inclinado</span>
								</div>
							</div>
						</div>
					</div>
					
					@endif
				</div>
			</div>
		</div>
	</main>
</div>
@endsection
