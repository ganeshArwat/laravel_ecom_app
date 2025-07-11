@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-2xl">
  <h2 class="text-2xl font-bold text-[#14532d] mb-4">Edit Product</h2>

  @if ($errors->any())
    <div class="mb-4 text-red-600 text-sm">
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="block mb-1 font-medium text-sm">Product Name</label>
      <input type="text" name="name" value="{{ old('name', $product->name) }}"
             class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-[#14532d] focus:border-[#14532d]" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1 font-medium text-sm">Description</label>
      <textarea name="description" rows="4"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-[#14532d] focus:border-[#14532d]">{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-4">
      <label class="block mb-1 font-medium text-sm">Price (₹)</label>
      <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
             class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-[#14532d] focus:border-[#14532d]" required>
    </div>

    <div class="mb-6">
      <label class="block mb-1 font-medium text-sm">Category</label>
      <select name="category_id"
              class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-[#14532d] focus:border-[#14532d]" required>
        <option value="">-- Select Category --</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}"
            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="flex items-center gap-4">
      <button type="submit" class="bg-[#14532d] text-white px-4 py-2 rounded hover:bg-green-800 transition">
        Update
      </button>
      <a href="{{ route('products.index') }}" class="text-gray-600 hover:underline">Cancel</a>
    </div>
  </form>
</div>
@endsection
