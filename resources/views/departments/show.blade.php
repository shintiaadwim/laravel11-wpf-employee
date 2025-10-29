<!-- Modal toggle -->
<button data-modal-target="modal-detail-{{ $department->id }}" data-modal-toggle="modal-detail-{{ $department->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Detail</button>
    <!-- Main modal -->
    <div id="modal-detail-{{ $department->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full bg-black/50">
        <div class="relative p-4 w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $department->nama_department }}</h3>

                    <button data-modal-hide="modal-detail-{{ $department->id }}"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-detail-{{ $department->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if ($department->employees->isEmpty())
                        <p class="p-2 text-sm text-gray-500 italic">Belum ada pegawai di departemen ini.</p>
                    @else
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Nama Pegawai</th>
                                    <th class="px-4 py-2">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department->employees as $index => $employee)
                                    <tr class="dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
                                        <td class="px-4 py-2">{{ $employee->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>


