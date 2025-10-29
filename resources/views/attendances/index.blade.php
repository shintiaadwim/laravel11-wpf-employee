@extends('master')
@section('title', 'Attendance')
@section('content')

<div class="p-4">
    <h1 class="text-4xl mb-4 font-bold">Attendance</h1>
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        @include('attendances.create')
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">NO</th>
                    <th scope="col" class="px-6 py-3">Nama Pegawai</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">Waktu Masuk</th>
                    <th scope="col" class="px-6 py-3">Waktu Keluar</th>
                    <th scope="col" class="px-6 py-3">Status Absensi</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($attendances as $attendance)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                    <td class="px-6 py-4">{{ $employees->find($attendance->employee_id)->nama_lengkap }}</td>
                    <td class="px-6 py-4">{{ date('d-m-Y', strtotime($attendance->tanggal)) }}</td>
                    <td class="px-6 py-4">{{ $attendance->waktu_masuk }}</td>
                    <td class="px-6 py-4">{{ $attendance->waktu_keluar }}</td>
                    <td class="px-6 py-4">{{ $attendance->status_absensi }}</td>
                    <td class="px-6 py-4">
                        @include('attendances.destroy', ['attendance' => $attendance])
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
