@extends('master')
@section('title', 'Department')
@section('content')

<div class="p-4">
    <h1 class="text-4xl mb-4 font-bold">Department</h1>
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        @include('departments.create')
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">NO</th>
                    <th scope="col" class="px-6 py-3">Nama Department</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($departments as $department)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                    <td class="px-6 py-4">{{ $department->nama_department }}</td>
                    <td class="px-6 py-4">
                        @include('departments.show', ['department' => $department])
                        @include('departments.edit', ['department' => $department])
                        @include('departments.destroy', ['department' => $department])
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
