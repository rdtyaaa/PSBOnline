@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Data User</h1>

                <a href="{{ url('/dashboard/user/create') }}" class="text-blue-500 hover:underline">Tambah User</a>

                <!-- Responsive table container -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Admin</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="text-gray-700 dark:text-gray-300">
                                    <td class="px-4 py-2 border">{{ $user->id }}</td>
                                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                                    <td class="px-4 py-2 border">{{ $user->is_admin ? "YA" : "BUKAN"  }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <a href="{{ url('/dashboard/user/edit'.'/'.$user->id) }}" class="text-blue-500 hover:underline">
                                            Edit
                                        </a>
                                        <form action="{{ url('/dashboard/user'.'/'.$user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline ml-4"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
