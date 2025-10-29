<!-- Modal toggle -->
<button data-modal-target="modal-detail-{{ $employee->id }}" data-modal-toggle="modal-detail-{{ $employee->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Detail</button>

<!-- Main modal -->
<div id="modal-detail-{{ $employee->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full bg-black/50">
    <div class="relative p-4 w-full max-w-xl">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detail Employee</h3>

                <button data-modal-hide="modal-detail-{{ $employee->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-detail-{{ $employee->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="text-xs text-gray-500 dark:text-gray-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                        <td class="px-6 py-2">{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <td class="px-6 py-2">{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Nomor Telepon</th>
                        <td class="px-6 py-2">{{ $employee->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                        <td class="px-6 py-2">{{ date('d-m-Y', strtotime($employee->tanggal_lahir)) }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <td class="px-6 py-2">{{ $employee->alamat }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Tanggal Masuk</th>
                        <td class="px-6 py-2">{{ date('d-m-Y', strtotime($employee->tanggal_masuk)) }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Department</th>
                        <td class="px-6 py-2">{{ $departments->find($employee->department_id)->nama_department }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <td class="px-6 py-2">{{ $positions->find($employee->position_id)->nama_jabatan }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <td class="px-6 py-2">{{ $employee->status }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
