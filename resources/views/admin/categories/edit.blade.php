@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="bg-white p-6 rounded-xl shadow max-w-xl">
  <h2 class="text-2xl font-bold text-[#14532d] mb-4">Edit Category</h2>

  @if ($errors->any())
    <div class="mb-4 text-red-600 text-sm">
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="name" class="block mb-1 font-medium text-sm text-gray-700">Category Name</label>
      <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
             class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#14532d] focus:border-[#14532d]" required>
    </div>

    <div class="flex items-center space-x-3 mt-6">
      <button type="submit" class="bg-[#14532d] text-white px-4 py-2 rounded hover:bg-[#0e3f22] transition">
        Update
      </button>
      <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline">Cancel</a>
    </div>
  </form>
</div>
@endsection
