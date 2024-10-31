<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\District;
use App\Models\Province;
use App\Models\Religion;
use Illuminate\View\View;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $provinces = Province::with('cities')->get(); // Eager load cities
        $districts = District::all(); // Fetch all districts
        $cities = City::all();
        $religions = Religion::all();

        return view('auth.register', compact('provinces', 'cities', 'districts', 'religions'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'current_address' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'city_id' => 'required|exists:cities,id',
            'province_id' => 'required|exists:provinces,id',
            'phone_number' => 'nullable|string|max:15',
            'mobile_number' => 'nullable|string|max:15',
            'email' => 'required|email|unique:users,email',
            'nationality' => 'required|string',
            'date_of_birth' => 'required|date',
            'place_of_birth_city' => 'required|string',
            'place_of_birth_province_id' => 'required|exists:provinces,id',
            'gender' => 'required|in:Male,Female',
            'marital_status' => 'required|in:Single,Married',
            'religion_id' => 'required|exists:religions,id',
            'password' => 'required|confirmed'
        ]);

        // dd($request->all());

        DB::beginTransaction();

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

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
            "user_id" => $user->id,
        ]);

        DB::commit();

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}
