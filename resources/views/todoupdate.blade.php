<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-xl font-semibold mb-4">Update Status</h2>

                    <form method="POST" action="{{ route('updateStatus', $todo->id) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Nama Project (Readonly) -->
                        <div class="col-span-2">
                            <label for="project_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Project:
                            </label>
                            <input type="text" id="project_name" value="{{ $todo->project->name }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   readonly>
                        </div>
                    

                        <!-- Nama Pekerjaan (Readonly) -->
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Pekerjaan:
                            </label>
                            <input type="text" name="name" id="name" value="{{ $todo->name }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   readonly>
                        </div>

                        <!-- Kategori (Readonly) -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kategori:
                            </label>
                            <input type="text" id="category" value="{{ $todo->category }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   readonly>
                        </div>

                        <!-- Status (Editable) -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Status:
                            </label>
                            <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                <option value="in-progress" {{ $todo->status == 'in-progress' ? 'selected' : '' }}>In-Progress</option>
                                <option value="review" {{ $todo->status == 'review' ? 'selected' : '' }}>Review</option>
                                <option value="done" {{ $todo->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>

                        <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update Status
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
