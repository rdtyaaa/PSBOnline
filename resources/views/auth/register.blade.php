@extends('layouts.guest')

@section('content')
    <div class="mx-auto mt-4 max-w-md">
        <h1 class="text-lg font-bold">Registration Form</h1>
        <img src="{{ asset('img/1326370.png') }}" alt="Background" class="h-40 w-full object-cover rounded-lg mb-4 mt-2">

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300"
                    required>
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="current_address" class="block text-sm font-medium text-gray-700">Alamat KTP</label>
                <input type="text" name="current_address" id="current_address"
                    class="mt-1 block w-full rounded-md border-gray-300" required>
                @error('current_address')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="province_id" class="block text-sm font-medium text-gray-700">Provinsi</label>
                <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" data-cities="{{ json_encode($province->cities) }}">
                            {{ $province->name }}</option>
                    @endforeach
                </select>
                @error('province_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="city_id" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                <select name="city_id" id="city_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="">Pilih Kabupaten</option>
                </select>
                @error('city_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="district_id" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <select name="district_id" id="district_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="">Pilih Kecamatan</option>
                </select>
                @error('district_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <script>
                document.getElementById('province_id').addEventListener('change', function() {
                    const cities = this.options[this.selectedIndex].dataset.cities ? JSON.parse(this.options[this
                        .selectedIndex].dataset.cities) : [];
                    const citySelect = document.getElementById('city_id');
                    const districtSelect = document.getElementById('district_id');

                    // Clear previous options
                    citySelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
                    districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                    // Populate cities based on selected province
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                });

                document.getElementById('city_id').addEventListener('change', function() {
                    const selectedCityId = this.value;
                    const districtSelect = document.getElementById('district_id');

                    // Clear previous options
                    districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                    // Find districts of the selected city
                    const districts = @json($districts); // Assuming $districts is an array of all districts
                    const filteredDistricts = districts.filter(district => district.city_id == selectedCityId);

                    // Populate districts based on selected city
                    filteredDistricts.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.id;
                        option.textContent = district.name;
                        districtSelect.appendChild(option);
                    });
                });
            </script>


            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" name="phone_number" id="phone_number"
                    class="mt-1 block w-full rounded-md border-gray-300" oninput="validateNumber(this)">
                @error('phone_number')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mobile_number" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="text" name="mobile_number" id="mobile_number"
                    class="mt-1 block w-full rounded-md border-gray-300" oninput="validateNumber(this)">
                @error('mobile_number')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <script>
                function validateNumber(input) {
                    // Hapus semua karakter yang bukan angka
                    const isNumeric = /^\d*$/.test(input.value);

                    if (!isNumeric) {
                        // Tampilkan alert jika input bukan angka
                        alert('Isian harus format angka.');
                        // Menghapus karakter yang bukan angka agar input tetap valid
                        input.value = input.value.replace(/\D/g, '');
                    }
                }
            </script>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300"
                    required>
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nationality" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                <input type="text" name="nationality" id="nationality
            <input type="text" name="nationality"
                    id="nationality" class="mt-1 block w-full rounded-md border-gray-300" required>
                @error('nationality')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="date_of_birth" id="date_of_birth"
                    class="mt-1 block w-full rounded-md border-gray-300" required>
                @error('date_of_birth')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="place_of_birth_province_id" class="block text-sm font-medium text-gray-700">Tempat Lahir
                    (Provinsi)</label>
                <select name="place_of_birth_province_id" id="place_of_birth_province_id"
                    class="mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" data-cities="{{ json_encode($province->cities) }}">
                            {{ $province->name }}</option>
                    @endforeach
                </select>
                @error('place_of_birth_province_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="place_of_birth_city" class="block text-sm font-medium text-gray-700">Tempat Lahir
                    (Kota)</label>
                <select name="place_of_birth_city" id="place_of_birth_city"
                    class="mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="">Pilih Kota</option>
                </select>
                @error('place_of_birth_city')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <script>
                document.getElementById('place_of_birth_province_id').addEventListener('change', function() {
                    const cities = this.options[this.selectedIndex].dataset.cities ? JSON.parse(this.options[this
                        .selectedIndex].dataset.cities) : [];
                    const citySelect = document.getElementById('place_of_birth_city');

                    // Clear previous options
                    citySelect.innerHTML = '<option value="">Pilih Kota</option>';

                    // Populate cities based on selected province
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.name; // Assuming you want the city name as the value
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                });
            </script>


            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Male">Laki-laki</option>
                    <option value="Female">Perempuan</option>
                </select>
                @error('gender')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="marital_status" class="block text-sm font-medium text-gray-700">Status Menikah</label>
                <select name="marital_status" id="marital_status" class="mt-1 block w-full rounded-md border-gray-300"
                    required>
                    <option value="">Pilih Status Menikah</option>
                    <option value="Single">Belum Menikah</option>
                    <option value="Married">Sudah Menikah</option>
                </select>
                @error('marital_status')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="religion_id" class="block text-sm font-medium text-gray-700">Agama</label>
                <select name="religion_id" id="religion_id" class="mt-1 block w-full rounded-md border-gray-300"
                    required>
                    <option value="">Pilih Agama</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('religion_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-md border-gray-300" required>
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300" required>
                @error('password_confirmation')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit"
                    class="w-full rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                    Daftar
                </button>
            </div>
        </form>
    </div>
@endsection
