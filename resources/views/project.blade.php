<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Flash dikit -->
                    @if(session('success'))
                        <div id="successMessage" class="mb-3 bg-yellow-500 text-white p-3 rounded mt-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Start of Modal-->
                        <!-- Overlay -->
                        <div id="modal-overlay" class="hidden fixed inset-0 bg-white bg-opacity-40 backdrop-blur-sm z-40"></div>

                        <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="mb-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        + Project
                    </button>

                    <!-- Overlay -->
                    <div id="modal-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-40"></div>

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
                        <div class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow-sm dark:bg-gray-700">

                            <!-- Modal content -->

                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Create New Project
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="POST" action="{{ route('storeproject') }}" class="p-4 md:p-5">
                                    @csrf
                                    @method('POST')
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ketik Nama Project" required>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Status
                                            </label>
                                            <select name="status" id="status" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option disabled selected="">Pilih Status</option>
                                                <option value="Archived">Archived</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Published">Published</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                            <select name="category" id="category" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option  disabled selected="">Pilih Kategori</option>
                                                <option value="Desktop">Desktop</option>
                                                <option value="Website">Website</option>
                                                <option value="Mobile">Mobile</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2">
                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Projek</label>
                                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                      placeholder="Ketik Deskripsi Projek di sini" required></textarea>
                                        </div>
                                    </div>
                                        <div class="flex space-x-3">
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Simpan
                                            </button>
                                            <button type="button" class="text-white inline-flex items-center bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-modal-toggle="crud-modal">
                                                Batal
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- End of Modal-->

                    <!-- Start of Table-->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Project
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kategori
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $projects as $project )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $project->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $project->category }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->status }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex space-x-2 justify-end">
                                                <!-- Delete Button -->
                                                <form action="{{ route('destroyProject', $project->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus todo ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Delete
                                                    </button>
                                                </form>
                                                <!-- Setting Button -->
                                                <a href="{{ route('todocreate', $project->id) }}" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                                    Setting
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-2 text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                    <!-- End of Table-->

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const modalToggleButtons = document.querySelectorAll("[data-modal-toggle='crud-modal']");
        const modal = document.getElementById("crud-modal");
        const overlay = document.getElementById("modal-overlay");

        modalToggleButtons.forEach(button => {
            button.addEventListener("click", function () {
                modal.classList.toggle("hidden");
                overlay.classList.toggle("hidden");
            });
        });

        // Tutup modal saat overlay diklik
        overlay.addEventListener("click", function () {
            modal.classList.add("hidden");
            overlay.classList.add("hidden");
        });
    });
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.transition = "opacity 0.5s ease";
                successMessage.style.opacity = "0";
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 500); // Tunggu animasi selesai sebelum menghapus elemen
            }
        }, 3000); // 3000 ms = 3 detik
    </script>

</x-app-layout>
