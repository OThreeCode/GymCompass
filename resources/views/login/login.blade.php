@extends('layouts.master')

@section('title', 'Login')

@section('content')
   <div>
      <form method="post" action="{{ route('login') }}">
         @csrf

         @error('not_valid')
            <div>
               <span class="text-sm bg-red-500">There's something wrong, motherfucker!</span>
            </div>
         @enderror

         <div>
            <label>Email:</label>
            <input name="email" type="text">
            @error('email')
               <div>
                  <span class="text-sm bg-red-500">{{ $message }}</span>
               </div>
            @enderror
         </div>
         <div>
            <label>Senha:</label>
            <input name="password" type="password">
            @error('password')
               <div>
                  <span class="text-sm bg-red-500">{{ $message }}</span>
               </div>
            @enderror
         </div>
         <div>
            <button type="submit">Enviar</button>
         </div>

      </form>
   </div>
@endsection
