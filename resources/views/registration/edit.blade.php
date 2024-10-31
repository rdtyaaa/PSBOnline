@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-bold">Edit Registration Data</h2>

                <form action="{{ url('/dashboard/registration/edit' . '/' . $registration->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Pilih User</label>
                        <select name="user_id" id="user_id" class="mt-1 block w-full rounded-md border-gray-300" disabled
                            required>
                            <option value="">Pilih User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $registration->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="current_address" class="block text-sm font-medium text-gray-700">Alamat KTP</label>
                        <input type="text" name="current_address" id="current_address"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            value="{{ old('current_address', $registration->current_address) }}" required>
                        @error('current_address')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="province_id" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <select name="province_id" id="province_id" class="mt-1 block w-full rounded-md border-gray-300"
                            >
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" data-cities="{{ json_encode($province->cities) }}"
                                    {{ $registration->province_id == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="city_id" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                        <select name="city_id" id="city_id" class="mt-1 block w-full rounded-md border-gray-300" >
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        @error('city_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="district_id" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <select name="district_id" id="district_id" class="mt-1 block w-full rounded-md border-gray-300"
                            >
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        @error('district_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const provinceSelect = document.getElementById('province_id');
                            const citySelect = document.getElementById('city_id');
                            const districtSelect = document.getElementById('district_id');

                            const selectedProvinceId = "{{ $registration->province_id }}";
                            const selectedCityId = "{{ $registration->city_id }}";
                            const selectedDistrictId = "{{ $registration->district_id }}";

                            provinceSelect.value = selectedProvinceId;
                            provinceSelect.dispatchEvent(new Event('change'));

                            citySelect.value = selectedCityId;
                            districtSelect.value = selectedDistrictId;

                            provinceSelect.addEventListener('change', function() {
                                const cities = this.options[this.selectedIndex].dataset.cities ? JSON.parse(this.options[
                                    this.selectedIndex].dataset.cities) : [];

                                citySelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
                                districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                                cities.forEach(city => {
                                    const option = document.createElement('option');
                                    option.value = city.id;
                                    option.textContent = city.name;
                                    citySelect.appendChild(option);
                                });

                                if (selectedCityId) {
                                    citySelect.value = selectedCityId;
                                    citySelect.dispatchEvent(new Event('change'));
                                }
                            });

                            citySelect.addEventListener('change', function() {
                                const selectedCityId = this.value;

                                districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                                const districts = @json($districts);
                                const filteredDistricts = districts.filter(district => district.city_id == selectedCityId);

                                filteredDistricts.forEach(district => {
                                    const option = document.createElement('option');
                                    option.value = district.id;
                                    option.textContent = district.name;
                                    districtSelect.appendChild(option);
                                });
                            });
                        });
                    </script>

                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="phone_number" id="phone_number"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            value="{{ old('phone_number', $registration->phone_number) }}">
                        @error('phone_number')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="text" name="mobile_number" id="mobile_number"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            value="{{ old('mobile_number', $registration->mobile_number) }}">
                        @error('mobile_number')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                        <input type="text" name="nationality" id="nationality"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            value="{{ old('nationality', $registration->nationality) }}" required>
                        @error('nationality')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="date_of_birth" id="date_of_birth"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            value="{{ old('date_of_birth', $registration->date_of_birth) }}">
                        @error('date_of_birth')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="place_of_birth_province_id" class="block text-sm font-medium text-gray-700">Tempat Lahir
                            (Provinsi)</label>
                        <select name="place_of_birth_province_id" id="place_of_birth_province_id"
                            class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" data-cities="{{ json_encode($province->cities) }}"
                                    {{ $registration->place_of_birth_province_id == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('place_of_birth_province_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="place_of_birth_city_id" class="block text-sm font-medium text-gray-700">Tempat Lahir
                            (Kabupaten)</label>
                        <select name="place_of_birth_city_id" id="place_of_birth_city_id"
                            class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        @error('place_of_birth_city_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const placeOfBirthProvinceSelect = document.getElementById('place_of_birth_province_id');
                            const placeOfBirthCitySelect = document.getElementById('place_of_birth_city_id');
                            const placeOfBirthDistrictSelect = document.getElementById('place_of_birth_district_id');

                            const selectedPlaceOfBirthProvinceId = "{{ $registration->place_of_birth_province_id }}";
                            const selectedPlaceOfBirthCityId = "{{ $registration->place_of_birth_city_id }}";
                            const selectedPlaceOfBirthDistrictId = "{{ $registration->place_of_birth_district_id }}";

                            placeOfBirthProvinceSelect.value = selectedPlaceOfBirthProvinceId;
                            placeOfBirthProvinceSelect.dispatchEvent(new Event('change'));

                            placeOfBirthCitySelect.value = selectedPlaceOfBirthCityId;
                            placeOfBirthDistrictSelect.value = selectedPlaceOfBirthDistrictId;

                            placeOfBirthProvinceSelect.addEventListener('change', function() {
                                const cities = this.options[this.selectedIndex].dataset.cities ? JSON.parse(this.options[
                                    this.selectedIndex].dataset.cities) : [];

                                placeOfBirthCitySelect.innerHTML = '<option value="">Pilih Kabupaten</option>';
                                placeOfBirthDistrictSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                                cities.forEach(city => {
                                    const option = document.createElement('option');
                                    option.value = city.id;
                                    option.textContent = city.name;
                                    placeOfBirthCitySelect.appendChild(option);
                                });

                                if (selectedPlaceOfBirthCityId) {
                                    placeOfBirthCitySelect.value = selectedPlaceOfBirthCityId;
                                    placeOfBirthCitySelect.dispatchEvent(new Event('change'));
                                }
                            });

                            placeOfBirthCitySelect.addEventListener('change', function() {
                                const selectedCityId = this.value;

                                placeOfBirthDistrictSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                                const districts = @json($districts);
                                const filteredDistricts = districts.filter(district => district.city_id == selectedCityId);

                                filteredDistricts.forEach(district => {
                                    const option = document.createElement('option');
                                    option.value = district.id;
                                    option.textContent = district.name;
                                    placeOfBirthDistrictSelect.appendChild(option);
                                });
                            });
                        });
                    </script>

                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300"
                            required>
                            <option value="male" {{ $registration->gender == 'male' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="female" {{ $registration->gender == 'female' ? 'selected' : '' }}>Perempuan
                            </option>
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
                            <option value="Single" {{ $registration->marital_status == "Single" ? "selected" : "" }}>Belum Menikah</option>
                            <option value="Married" {{ $registration->marital_status == "Married" ? "selected" : ""}}>Sudah Menikah</option>
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
                                <option value="{{ $religion->id }}" {{ $registration->religion_id == $religion->id ? "selected" : "" }}>{{ $religion->name }}</option>
                            @endforeach
                        </select>
                        @error('religion_id')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
