<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\Role;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user()->load(['doctor', 'patient']);

        return hybridly('profile.show', [
            'user' => $user,
            'auth' => ['user' => $user]
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'gender' => 'required|in:male,female',
            // Doctor specific fields
            'speciality' => $user->role === Role::DOCTOR ? 'required|string' : 'nullable',
            'qualification' => $user->role === Role::DOCTOR ? 'required|string' : 'nullable',
            // Patient specific fields
            'medical_history' => $user->role === Role::PATIENT ? 'nullable|string' : 'nullable',
            'allergies' => $user->role === Role::PATIENT ? 'nullable|string' : 'nullable',
            'current_medications' => $user->role === Role::PATIENT ? 'nullable|string' : 'nullable',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
        ]);

        if ($user->role === Role::DOCTOR && $user->doctor) {
            $user->doctor->update([
                'speciality' => $validated['speciality'],
                'qualification' => $validated['qualification'],
            ]);
        }

        if ($user->role === Role::PATIENT && $user->patient) {
            $user->patient->update([
                'medical_history' => $validated['medical_history'],
                'allergies' => $validated['allergies'],
                'current_medications' => $validated['current_medications'],
            ]);
        }

        return back()->with('success', 'Profile updated successfully');
    }
} 