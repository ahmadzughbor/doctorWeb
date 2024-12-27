<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Enums\Role;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $appointments = [];
        $availableDoctors = [];

        if ($user->role === Role::DOCTOR) {
            $appointments = Appointment::with(['patient.user'])
                ->where('doctor_id', $user->doctor->id)
                ->get();
        } else {
            $appointments = Appointment::with(['doctor.user'])
                ->where('patient_id', $user->patient->id)
                ->get();
            $availableDoctors = Doctor::with('user')->get();
        }

        return hybridly('appointments.index', [
            'appointments' => $appointments,
            'available_doctors' => $availableDoctors,
            'is_doctor' => $user->role === Role::DOCTOR,
            'auth' => [
                'user' => $user
            ]
        ]);
    }

    public function store(Request $request)
    {
        \Log::info('Appointment store called', [
            'request' => $request->all(),
            'method' => $request->method()
        ]);

        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after:today',
            'time' => 'required',
        ]);

        try {
            $startsAt = $validated['date'] . ' ' . $validated['time'];

            Appointment::create([
                'doctor_id' => $validated['doctor_id'],
                'patient_id' => auth()->user()->patient->id,
                'starts_at' => $startsAt,
                'status' => 'scheduled',
            ]);

            // Return Hybridly response
            return hybridly('appointments.index', [
                'appointments' => auth()->user()->patient->appointments()->with('doctor.user')->get(),
                'available_doctors' => Doctor::with('user')->get(),
                'is_doctor' => false,
                'auth' => [
                    'user' => auth()->user()
                ],
                'flash' => [
                    'success' => 'Appointment booked successfully'
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Appointment creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withErrors(['error' => 'Failed to book appointment: ' . $e->getMessage()]);
        }
    }
} 