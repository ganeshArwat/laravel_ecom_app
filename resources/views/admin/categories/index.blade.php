@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#14532d]">Categories</h2>
        <a href="{{ route('categories.create') }}" class="bg-[#c2661b] text-white px-4 py-2 rounded hover:bg-orange-700 transition">
            + Add Category
        </a>
    </div>

    @if (session('success'))
    <div class="mb-4 text-green-600 font-medium">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto rounded border border-gray-200">
        <table class="min-w-full text-sm bg-white">
            <thead class="bg-[#f3f2ee] text-gray-700 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">Category Name</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3">{{ $category->name }}</td>
                    <td class="px-6 py-3 text-right space-x-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection