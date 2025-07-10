<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Admin')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex min-h-screen">
  
  {{-- Sidebar --}}
  @include('admin.partials.sidebar')

  {{-- Main Content --}}
  <main class="flex-1 p-6">
    @yield('content')
  </main>

</body>
</html>
