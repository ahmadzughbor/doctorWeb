<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect based on user role
            $user = Auth::user();
            
            if ($user->role === Role::PATIENT) {
                return hybridly('doctors.index', [
                    'doctors' => \App\Models\Doctor::with('user')->get(),
                    'auth' => ['user' => $user]
                ]);
            } elseif ($user->role === Role::DOCTOR) {
                // Load the doctor relationship first
                $user->load('doctor.appointments.patient.user');
                
                return hybridly('appointments.index', [
                    'appointments' => $user->doctor ? $user->doctor->appointments : [],
                    'is_doctor' => true,
                    'auth' => ['user' => $user]
                ]);
            } elseif ($user->role === Role::ADMIN) {
                return redirect('/admin');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page instead of home page
        return hybridly('security.login', [
            'errors' => [],
            'flash' => ['success' => 'Successfully logged out']
        ]);
    }
}
