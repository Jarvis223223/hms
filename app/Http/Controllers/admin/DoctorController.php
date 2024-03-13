<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view("admin.doctor.index", compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.doctor.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
            'room' => 'required',
            'image' => 'required|image|mimes:png,jep,jpeg',
        ]);

        $image = $request->image;
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/form-images', $imageName);

        Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'specialty' => $request->specialty,
            'room' => $request->room,
            'image' => $imageName,
        ]);

        return redirect('admin/doctors')->with('successMsg', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'specialty' => 'required',
            'room' => 'required',
        ]);
        $doctor = Doctor::find($id);

        if($request->hasFile('image'))
        {
            $doctorImg = $doctor->image;
            File::delete('storage/form-images/'.$doctorImg);
            $image = $request->image;
            $imageName = uniqid().'_'. $image->getClientOriginalName();

            $image->storeAs('public/form-images',$imageName);
            $doctor->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'specialty' => $request->specialty,
                'room' => $request->room,
                'image' => $imageName
            ]);
        }

        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'specialty' => $request->specialty,
            'room' => $request->room,
        ]);
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Doctor::find($id)->delete();
        return redirect()->back();
    }
}
