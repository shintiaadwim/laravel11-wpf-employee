@extends('master')
@section('title', 'Salaries')
@section('content')

<div class="p-4">
    <h1 class="text-4xl mb-4 font-bold">Salaries</h1>
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        @include('salaries.create')
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">NO</th>
                    <th scope="col" class="px-6 py-3">Nama Pegawai</th>
                    <th scope="col" class="px-6 py-3">Bulan</th>
                    <th scope="col" class="px-6 py-3">Gaji Pokok</th>
                    <th scope="col" class="px-6 py-3">Tunjangan</th>
                    <th scope="col" class="px-6 py-3">Potongan</th>
                    <th scope="col" class="px-6 py-3">Total Gaji</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($salaries as $salarie)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                    <td class="px-6 py-4">{{ $employees->find($salarie->employee_id)->nama_lengkap }}</td>
                    <td class="px-6 py-4">{{ strftime('%B', strtotime($salarie->bulan)) }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($salarie->gaji_pokok, 2, ',', '.') }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($salarie->tunjangan, 2, ',', '.') }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($salarie->potongan, 2, ',', '.') }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($salarie->total_gaji, 2, ',', '.') }}</td>

                    <td class="px-6 py-4">
                        {{-- @include('salaries.show', ['salarie' => $salarie]) --}}
                        @include('salaries.edit', ['salarie' => $salarie])
                        @include('salaries.destroy', ['salarie' => $salarie])
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
