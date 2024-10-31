<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Registration;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function index()
    {
        $registrations = Registration::with(['user', 'district', 'city', 'province', 'religion', 'placeOfBirthProvince'])
            ->paginate(10);

        return view('registration.index', compact('registrations'));
    }


    public function create()
    {

        $provinces = Province::with('cities')->get();
        $districts = District::all();
        $cities = City::all();
        $religions = Religion::all();

        if (Auth::check()) {
            $users = User::doesntHave('registration')->get();
            return view('registration.create', compact('users', 'provinces', 'cities', 'districts', 'religions'));
        }

        return view('auth.register', compact('provinces', 'cities', 'districts', 'religions'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'current_address' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'city_id' => 'required|exists:cities,id',
            'province_id' => 'required|exists:provinces,id',
            'phone_number' => 'nullable|string|max:15',
            'mobile_number' => 'nullable|string|max:15',
            'nationality' => 'required|string',
            'date_of_birth' => 'required|date',
            'place_of_birth_city' => 'required|string',
            'place_of_birth_province_id' => 'required|exists:provinces,id',
            'gender' => 'required|in:Male,Female',
            'marital_status' => 'required|in:Single,Married',
            'religion_id' => 'required|exists:religions,id',
        ]);

        if (Auth::check()) {
            $request->validate([
                'user_id' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
            ]);
        }

        DB::beginTransaction();

        if (!Auth::check()) {
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
        }

        Registration::create([
            "current_address" => $request->current_address,
            "district_id" => $request->district_id,
            "city_id" => $request->city_id,
            "province_id" => $request->province_id,
            "phone_number" => $request->phone_number,
            "mobile_number" => $request->mobile_number,
            "nationality" => $request->nationality,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth_city" => $request->place_of_birth_city,
            "place_of_birth_province_id" => $request->place_of_birth_province_id,
            "gender" => $request->gender,
            "martial_status" => $request->martial_status,
            "religion_id" => $request->religion_id,
            "user_id" => Auth::check() ? $request->user_id : $user->id,
        ]);

        DB::commit();

        if (Auth::check()) {
            return redirect('/dashboard/registration')->with('success', 'Successfully added registration!');
        } else {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Registration successful!');
        }
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        $users = User::all();
        $provinces = Province::with('cities')->get();
        $cities = Province::all();
        $districts = District::all();
        $religions = Religion::all();

        return view('registration.edit', compact('registration', 'users', 'provinces', 'districts', 'religions'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'current_address' => 'required|string',
            'phone_number' => 'nullable|string|max:15',
            'mobile_number' => 'nullable|string|max:15',
            'nationality' => 'required|string',
            'gender' => 'required|in:male,female',
            'marital_status' => 'required|in:Single,Married',
            'religion_id' => 'required|exists:religions,id',
        ]);

        DB::beginTransaction();

        $registration = Registration::findOrFail($id);

        $registration->update([
            "current_address" => $request->current_address,
            "district_id" => $request->district_id ?? $registration->district_id,
            "city_id" => $request->city_id ?? $registration->city_id,
            "province_id" => $request->province_id ?? $registration->province_id,
            "phone_number" => $request->phone_number,
            "mobile_number" => $request->mobile_number,
            "nationality" => $request->nationality,
            "date_of_birth" => $request->date_of_birth ?? $registration->date_of_birth,
            "place_of_birth_city" => $request->place_of_birth_city ?? $registration->place_of_birth_city,
            "place_of_birth_province_id" => $request->place_of_birth_province_id ?? $registration->place_of_birth_province_id,
            "gender" => $request->gender,
            "martial_status" => $request->martial_status,
            "religion_id" => $request->religion_id,
        ]);

        DB::commit();

        return redirect('/dashboard/registration')->with('success', 'Successfully edited registration!');
    }

    public function destroy($id)
    {

        Registration::destroy($id);

        return redirect('/dashboard/registration')->with('success', 'Registration deleted successfully!');
    }
}
