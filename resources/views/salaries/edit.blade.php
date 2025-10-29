<!-- Modal toggle -->
<button data-modal-target="modal-edit-{{ $salarie->id }}" data-modal-toggle="modal-edit-{{ $salarie->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
<!-- Main modal -->
<div id="modal-edit-{{ $salarie->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full bg-black/50">
    <div class="relative p-4 w-full max-w-xl">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Update Salarie</h3>

                <button data-modal-hide="modal-edit-{{ $salarie->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-edit-{{ $salarie->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('salaries.update', $salarie->id) }}" method="POST" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                        <input type="month" name="bulan" id="bulan" value="{{ old('bulan', $salarie->bulan) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bulan" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tunjangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tunjangan</label>
                        <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', $salarie->tunjangan) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tunjangan" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="potongan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potongan</label>
                        <input type="number" name="potongan" id="potongan" value="{{ old('potongan', $salarie->potongan) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Potongan" required>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </form>
        </div>
    </div>
</div>
