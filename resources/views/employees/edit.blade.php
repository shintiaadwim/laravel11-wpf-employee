<!-- Modal toggle -->
<button data-modal-target="modal-edit-{{ $employee->id }}" data-modal-toggle="modal-edit-{{ $employee->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>

<!-- Main modal -->
<div id="modal-edit-{{ $employee->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full bg-black/50">
    <div class="relative p-4 w-full max-w-xl">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Employee</h3>

                <button data-modal-hide="modal-edit-{{ $employee->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-edit-{{ $employee->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Full Name" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email', $employee->email) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telp</label>
                        <input type="number" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No. Telp" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birthday</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Date of Birthday" required>
                    </div>

                    <div class="col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="2"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write address here">{{ old('alamat', $employee->alamat) }}
                        </textarea>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tanggal Masuk" required>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <select name="department_id" id="department_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->nama_department }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="position_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <select name="position_id" id="position_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                    {{ $position->nama_jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select name="status" id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                    </div>

                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </form>
        </div>
    </div>
</div>
