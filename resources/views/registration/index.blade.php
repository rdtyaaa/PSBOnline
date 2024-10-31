@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Data Pendaftaran</h1>
                    <a href="{{ url('/dashboard/registration/create') }}" class="text-blue-600 hover:text-blue-900">Tambah Data</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Address</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">District</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Province</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobile Number</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nationality</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Birth</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marital Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Religion</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->current_address }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->district->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->city->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->province->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->phone_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->mobile_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->nationality }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->date_of_birth->format('d-m-Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->place_of_birth_city }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->gender }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->marital_status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $registration->religion->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ url('/dashboard/registration/edit'.'/'.$registration->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                            <form action="{{ url('/dashboard/registration'.'/'.$registration->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
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
    </div>
@endsection
