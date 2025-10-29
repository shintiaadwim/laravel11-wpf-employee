<?php

namespace App\Http\Controllers;

use App\Models\Salaries;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    // Display a listing of the resource.
    public function index() {
        $salaries = Salaries::with('employee')->latest()->get();
        $employees = Employee::all();
        return view('salaries.index', compact('salaries', 'employees'));
    }

    // Show the form for creating a new resource.
    public function create() {
        return view('salaries.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request) {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        // Ambil data employee beserta position-nya
        $employee = Employee::with('position')->findOrFail($request->employee_id);
        // Ambil gaji pokok dari posisi pegawai
        $gaji_pokok = $employee->position->gaji_pokok ?? 0;
        // Hitung total gaji
        $total_gaji = $gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);
        // Simpan ke database
        Salaries::create([
            'employee_id' => $request->employee_id,
            'bulan'       => $request->bulan,
            'gaji_pokok'  => $gaji_pokok,
            'tunjangan'   => $request->tunjangan,
            'potongan'    => $request->potongan,
            'total_gaji'  => $total_gaji,
        ]);

        return redirect()->route('salaries.index');
    }

    // Display the specified resource.
    public function show(string $id) {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id) {
        $salarie = Salaries::find($id);
        return view('salaries.show', compact('salarie'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id) {
        $request->validate([
            'bulan'       => 'required|string|max:10',
            'tunjangan'   => 'nullable|numeric|min:0',
            'potongan'    => 'nullable|numeric|min:0',
        ]);

        $salarie = Salaries::with('employee.position')->findOrFail($id);
        $gaji_pokok = $salarie->employee->position->gaji_pokok ?? 0;
        $total_gaji = $gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        $salarie->update([
            'bulan'       => $request->bulan,
            'tunjangan'   => $request->tunjangan,
            'potongan'    => $request->potongan,
            'gaji_pokok'  => $gaji_pokok, // tetap disimpan otomatis
            'total_gaji'  => $total_gaji, // dihitung ulang otomatis
        ]);

        return redirect()->route('salaries.index');
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        $salarie = Salaries::findOrFail($id);
        $salarie->delete();
        return redirect()->route('salaries.index');
    }
}
