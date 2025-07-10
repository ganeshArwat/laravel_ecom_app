<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-[#0b0b0b] to-[#1a1a1a] min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="px-8 py-10">

      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <img src="{{ asset('images/CNE_O.png') }}" alt="Logo" class="w-20 h-20 rounded-lg shadow-md" />
      </div>

      <!-- Heading -->
      <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Admin Login</h2>

      <!-- Form -->
      <form method="POST" action="{{ url('/admin/login') }}">
        @csrf

        <!-- Error -->
        @if(session('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm text-center">
            {{ session('error') }}
          </div>
        @endif

        <!-- Email -->
        <div class="mb-5">
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#166534] focus:border-transparent transition" required />
        </div>

        <!-- Password -->
        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#166534] focus:border-transparent transition" required />
        </div>

        <!-- Submit -->
        <button type="submit" class="w-full bg-[#166534] text-white font-medium py-2 rounded-lg hover:bg-[#14532d] transition duration-200">
          Login
        </button>
      </form>
    </div>
  </div>

</body>
</html>
