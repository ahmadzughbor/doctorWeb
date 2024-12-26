<?php

namespace App\Http\Controllers\Marketing;

use App\Data\DoctorData;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Hybridly\Contracts\HybridResponse;

class ShowDoctorsController extends Controller
{
    public function __invoke(): HybridResponse
    {
        return hybridly('marketing.doctors', [
            'doctors' => DoctorData::collection(Doctor::all()),
        ]);
    }
}
