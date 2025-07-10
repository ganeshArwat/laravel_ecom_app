<!-- resources/views/admin/partials/sidebar.blade.php -->
<aside class="bg-[#14532d] text-white w-64 hidden lg:flex flex-col py-8 shadow-lg">
  <!-- Logo & Title -->
  <div class="text-center mb-10 px-6">
    <img src="{{ asset('images/CNE_O.png') }}" alt="Logo" class="mx-auto w-14 h-14 rounded-md shadow mb-2">
    <h1 class="text-lg font-semibold tracking-wide">Admin Panel</h1>
  </div>

  <!-- Navigation -->
  <nav class="flex-1 space-y-1 px-4 text-sm font-medium">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[#166534] transition">
      🏠 <span>Dashboard</span>
    </a>
    <a href="{{ route('categories.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[#166534] transition">
      📂 <span>Categories</span>
    </a>
    <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[#166534] transition">
      📦 <span>Products</span>
    </a>
    <a href="{{ route('admin.sellers.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-[#166534] transition">
      👥 <span>Sellers</span>
    </a>
  </nav>

  <!-- Logout Button -->
  <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto px-4">
    @csrf
    <button type="submit"
      class="w-full flex items-center gap-2 px-4 py-2 text-sm bg-red-600 hover:bg-red-700 rounded-lg transition">
      🚪 <span>Logout</span>
    </button>
  </form>
</aside>
