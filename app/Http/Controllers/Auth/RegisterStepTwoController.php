<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class RegisterStepTwoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();

        return view('auth.register-step2', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
        ]);

        if ($request->hasFile('photo')) {
            auth()->user()->addMediaFromRequest('photo')->toMediaCollection('photos');
        }

        return redirect()->route('dashboard');
    }
}
