<html>
   <head>
      <title>Gym Compass - @yield('title')</title>

      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
      <div class="container">
            @yield('content')
      </div>
   </body>
</html>
