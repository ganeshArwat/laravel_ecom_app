@extends('layouts.admin')

@section('title', 'Sellers')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">
  <h2 class="text-2xl font-bold text-[#14532d] mb-4">Registered Sellers</h2>

  <table class="min-w-full text-sm bg-white rounded overflow-hidden shadow">
    <thead class="bg-[#f2e8df] text-left text-gray-700">
      <tr>
        <th class="px-4 py-3">#</th>
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Email</th>
        <th class="px-4 py-3">Email Verified</th>
        <th class="px-4 py-3">Registered At</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      @forelse ($sellers as $seller)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2">{{ $loop->iteration }}</td>
          <td class="px-4 py-2 font-medium">{{ $seller->name }}</td>
          <td class="px-4 py-2">{{ $seller->email }}</td>
          <td class="px-4 py-2">
            @if ($seller->email_verified_at)
              <span class="text-green-600 font-semibold">✔ Verified</span>
            @else
              <span class="text-red-500 font-semibold">✖ Not Verified</span>
            @endif
          </td>
          <td class="px-4 py-2">{{ $seller->created_at->format('d M Y') }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="px-4 py-4 text-center text-gray-500">No sellers found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-4">
    {{ $sellers->links() }}
  </div>
</div>
@endsection
