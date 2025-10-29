<div class="relative overflow-x-auto w-full shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

        <form action="{{ route('attendances.store') }}" method="POST" class="p-4 md:p-5">
            @csrf
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Pegawai</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">Status Absensi</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        <select name="employee_id" id="employee_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" selected disabled>Select Pegawai</option>
                            @foreach ($employees  as $employee )
                                <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </td>
                    <td class="px-6 py-4">
                        <select name="status_absensi" id="status_absensi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" selected disabled>Select Kehadiran</option>
                            @foreach (['hadir', 'izin', 'sakit', 'alpha'] as $status)
                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Check In</button>
                    </td>
                </tr>
            </tbody>
        </form>

    </table>
</div>
