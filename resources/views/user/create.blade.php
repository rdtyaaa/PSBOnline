@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Tambah User</h1>

                <form action="{{ url('/dashboard/user/create') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" name="name" id="name" 
                               class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-300" 
                               required>
                        @error('name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" 
                               class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-300" 
                               required>
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" name="password" id="password" 
                               class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-300" 
                               required>
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="is_admin" class="flex items-center">
                            <span class="text-sm text-gray-700 dark:text-gray-300 mr-2">Is Admin</span>
                            <input type="checkbox" name="is_admin" id="is_admin" 
                                   class="toggle toggle-lg" 
                                   onchange="this.value = this.checked ? 1 : 0">
                        </label>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                            Tambah User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
