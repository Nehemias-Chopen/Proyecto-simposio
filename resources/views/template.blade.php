<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  
</head>
<body class="min-h-[100vh] flex justify-center items-center flex-col ">
  <header class="bg-sky-900 w-full py-2 shadow-2xl sticky top-0">
    <img src="https://www.logolynx.com/images/logolynx/46/462b25e81d9022b037b0f07b4705bff0.png" alt="Logo Mariano Galvez" class="m-auto w-20 h-16">
  </header>
  @yield('content')
  <footer class="w-full">
    <img src="{{ asset('/img/Fogata.svg') }}" alt="Imagen Fogata" class="w-full object-cover">
  </footer>
</body>
</html>