<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get();

        return hybridly('doctors.index', [
            'doctors' => $doctors,
            'auth' => [
                'user' => auth()->user()
            ]
        ]);
    }

    public function show($id)
    {
        $doctor = Doctor::with(['user', 'appointments'])->findOrFail($id);

        return hybridly('doctors.show', [
            'doctor' => $doctor,
            'auth' => [
                'user' => auth()->user()
            ]
        ]);
    }
} 