<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#14532d',
            primaryLight: '#166534',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50 text-gray-800 flex min-h-screen">

  <!-- Sidebar -->
  <aside class="bg-primary text-white w-64 hidden lg:flex flex-col px-6 py-8 space-y-6 shadow-lg">
    <h1 class="text-2xl font-extrabold">Admin Panel</h1>
    <nav class="space-y-2">
      <a href="#" class="block px-4 py-2 rounded hover:bg-primaryLight transition">Dashboard</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-primaryLight transition">Categories</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-primaryLight transition">Products</a>
      <a href="#" class="block px-4 py-2 rounded hover:bg-primaryLight transition">Sellers</a>
    </nav>
    <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto">
      @csrf
      <button type="submit" class="w-full text-left px-4 py-2 rounded bg-red-600 hover:bg-red-700 transition">
        Logout
      </button>
    </form>
  </aside>

  <!-- Mobile Sidebar Toggle -->
  <div class="lg:hidden fixed top-0 left-0 w-full bg-primary text-white flex items-center justify-between px-6 py-4 shadow-md z-10">
    <h1 class="text-xl font-bold">Admin</h1>
    <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="text-white">
      ☰
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="lg:hidden fixed top-[60px] left-0 w-full bg-primary text-white px-6 py-4 space-y-2 hidden z-20">
    <a href="#" class="block py-2 hover:bg-primaryLight rounded">Dashboard</a>
    <a href="#" class="block py-2 hover:bg-primaryLight rounded">Categories</a>
    <a href="#" class="block py-2 hover:bg-primaryLight rounded">Products</a>
    <a href="#" class="block py-2 hover:bg-primaryLight rounded">Sellers</a>
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit" class="block w-full text-left py-2 bg-red-600 hover:bg-red-700 rounded">Logout</button>
    </form>
  </div>

  <!-- Main Content -->
  <main class="flex-1 p-6 mt-[60px] lg:mt-0 w-full">
    <div class="bg-white rounded-xl shadow p-6">
      <h2 class="text-2xl font-bold text-primary mb-4">Welcome, Admin!</h2>
      <p class="text-gray-600">This is your modern dashboard. Use the navigation to manage categories, products, and sellers.</p>
    </div>
  </main>

</body>
</html>
