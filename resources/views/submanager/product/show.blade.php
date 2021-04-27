@extends('layouts.authenticated')

@section('title', 'Produto')

@section('content')
<main class="relative z-0 flex-1 overflow-y-auto focus:outline-none" tabindex="0">
   <div class="py-6">
      {{ $product->name }}
   </div>
</main>
@endsection