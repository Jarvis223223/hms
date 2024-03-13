<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $users= User::all();
        return view("admin.dashboard", compact('doctors', 'users'));
    }

    public function showAppointment() {
        $appointments = Appointment::all();
        return view('admin.showAppointment', compact('appointments'));
    }

    public function approve($id) {
        $appointment = Appointment::find($id);
        $appointment->update([
            'status' => 'approved'
        ]);
        return redirect()->back();
    }

    public function cancle($id) {
        $appointment = Appointment::find($id);
        $appointment->update([
            'status' => 'cancled'
        ]);
        return redirect()->back();
    }
}
