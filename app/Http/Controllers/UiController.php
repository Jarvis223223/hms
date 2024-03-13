<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UiController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        $users = User::all();
        return view("ui-panel.master", compact('doctors', 'users'));
    }

    public function about()
    {
        return view('ui-panel.about');
    }

    public function contact()
    {
        return view('ui-panel.contact-us');
    }



    public function appointment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'doctor' => 'required',
            'date' => 'required',
            'message' => 'required',
        ]);

        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'doctor' => $request->doctor,
            'date' => $request->date,
            'status' => 'In progress',
            'message' => $request->message,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    public function myAppointment() {
        if (Auth::id()) {
            $userId = Auth::user()->id;
            $appointments = Appointment::where('user_id', $userId)->get();
            return view('ui-panel.myAppointment', compact('appointments'));
        } else {
            return redirect()->back();
        }
    }

    public function cancleAppointment($id) {
        Appointment::find($id)->delete();
        return redirect()->back();
    }
}
