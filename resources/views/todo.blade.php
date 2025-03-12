<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Todo') }}
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

                        <script>
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
                    @endif

                    <!-- Tabel Todo List -->
                    <div class="mt-2 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Project</th>
                                    <th scope="col" class="px-6 py-3">Category</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($todos as $todo)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $todo->name }}
                                        </td>
                                        <td scope="row" class="px-6 py-4">
                                            @php $status = strtolower(trim($todo->status)); @endphp
                                            @if ($status == 'done')
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-500 text-white">
                                                    Done
                                                </span>
                                            @elseif ($status == 'in-progress')
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-500 text-white">
                                                    In Progress
                                                </span>
                                            @elseif ($status == 'review')
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-500 text-white">
                                                    Review
                                                </span>
                                            @else
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-500 text-white">
                                                    Unknown ({{ $todo->status }})
                                                </span>
                                            @endif
                                        </td>

                                        <td scope="row" class="px-6 py-4">
                                            {{ $todo->project ? $todo->project->name : 'Tidak Ada Project' }}
                                        </td>
                                        <td scope="row" class="px-6 py-4">
                                            {{ $todo->category }}
                                        </td>
                                        <td>
                                            <div class="flex space-x-2">
                                                <form action="{{ route('tododestroy', $todo->id) }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus todo ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Delete
                                                    </button>
                                                </form>
                                                <a href="{{ route('todoedit', $todo->id) }}"
                                                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                                                    Review
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-2 text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    <div class="bg-gray-400 text-gray-900 p-2 rounded mt-2">
                        <p>Total Skor Todo: {{ $totalScore }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
