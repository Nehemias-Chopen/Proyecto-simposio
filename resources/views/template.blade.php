<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  
</head>
<body class="min-h-[100vh] flex justify-center items-center flex-col ">
  @yield('content')
  <footer class="w-full">
    <img src="{{ asset('/img/Fogata.svg') }}" alt="Imagen Fogata" class="w-full object-cover">
  </footer>
</body>
</html>