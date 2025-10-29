<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Display a listing of the resource.
    public function index() {
        $attendances = Attendance::with('employee')->latest()->get();
        $employees = Employee::all();
        return view('attendances.index', compact('attendances', 'employees'));
    }

    // Show the form for creating a new resource.
    public function create() {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request) {
        $request->validate([
            'employee_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $employee_id = $request->input('employee_id');
        $tanggal = $request->input('tanggal');
        $status = $request->input('status_absensi');
        $now = now();

        // Cek apakah absensi sudah ada untuk karyawan & tanggal ini
        $attendance = Attendance::where('employee_id', $employee_id)
            ->whereDate('tanggal', $tanggal)
            ->first();

        if (!$attendance) {
            // Belum ada → catat waktu masuk
            $attendance = Attendance::create([
                'employee_id'       => $employee_id,
                'tanggal'           => $tanggal,
                'waktu_masuk'       => $now,
                'status_absensi'    => $status,
            ]);
        } elseif (is_null($attendance->waktu_keluar)) {
            // Sudah ada tapi belum keluar → isi waktu keluar
            $attendance->update(['waktu_keluar' => $now]);
        }
        return redirect()->route('attendances.index');
    }

    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy(string $id) {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index');
    }
}
