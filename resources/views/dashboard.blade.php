<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Display success message if it exists in the session -->
    @if (session('success'))
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">Succès</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-6 sm:rounded-lg">
                <h1>Todo List</h1>
                <form action="{{ route('task.store') }}" method="POST" class="flex items-center	gap-4">
                    @csrf
                    <label for="task">Tâche à ajouter:</label>
                    <input name="task" type="text">
                    {{-- <button type="submit"
                        class="p-2 px-4 transition duration-300 ease-in-out bg-gradient-to-r from-[#8c0038] to-[#d63a76] hover:from-rose-900 hover:to-rose-700 text-white">
                        Ajouter
                    </button> --}}
                    {{-- <button type="submit"
                        class="p-2 px-4 transition bg-opacity-0 hover:bg-opacity-100 duration-300 ease-in-out bg-gradient-to-r from-rose-700 to-rose-900 hover:from-rose-900 hover:to-rose-700 text-white">
                        Ajouter
                    </button> --}}
                    <button type="submit"
                        class="p-2 px-4 transition duration-300 ease-in-out bg-gradient-to-r bg-rose-900 hover:bg-rose-700 text-white">
                        Ajouter
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
