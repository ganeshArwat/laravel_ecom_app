@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[#14532d]">Products</h2>
    <a href="{{ route('products.create') }}" class="bg-[#c2661b] text-white px-4 py-2 rounded hover:bg-orange-700 transition">
      + Add Product
    </a>
  </div>

  @if (session('success'))
    <div class="mb-4 text-green-600 font-medium">
      {{ session('success') }}
    </div>
  @endif

  <table class="min-w-full text-sm bg-white rounded overflow-hidden shadow">
    <thead class="bg-[#f2e8df] text-gray-700 uppercase text-xs tracking-wider">
      <tr>
        <th class="px-4 py-3">#</th>
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Price</th>
        <th class="px-4 py-3">Category</th>
        <th class="px-4 py-3 text-right">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      @forelse ($products as $product)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3">{{ $loop->iteration }}</td>
          <td class="px-4 py-3 font-semibold">{{ $product->name }}</td>
          <td class="px-4 py-3">₹{{ number_format($product->price, 2) }}</td>
          <td class="px-4 py-3">{{ $product->category->name ?? '—' }}</td>
          <td class="px-4 py-3 text-right space-x-2">
            <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:underline">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this product?')">
              @csrf
              @method('DELETE')
              <button class="text-red-600 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="px-4 py-4 text-center text-gray-500">No products found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-4">
    {{ $products->links() }}
  </div>
</div>
@endsection
