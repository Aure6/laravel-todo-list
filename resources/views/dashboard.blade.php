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

    <div class="py-2 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm p-6 sm:rounded-lg">
                <h1 class="text-xl">Todo List</h1>
                {{-- Form for adding a task --}}
                <form action="{{ route('task.store') }}" method="POST" class="flex flex-wrap items-center	gap-2">
                    @csrf
                    <label for="task">Tâche à ajouter:</label>
                    <input name="description" type="text">
                    <button type="submit"
                        class="p-2 px-4 transition duration-300 ease-in-out bg-gradient-to-r bg-rose-800 hover:bg-rose-500 text-white">
                        Ajouter
                    </button>
                </form>
                {{-- Tasks list --}}
                <ul class="mt-4 divide-y">
                    @foreach ($tasks as $task)
                        <x-task-line :task="$task">
                        </x-task-line>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <x-modal name="confirm-task-deletion" {{-- :show="$errors->userDeletion->isNotEmpty()" --}} focusable>
        <form method="post" action="{{ route('task.destroy', $task->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this task?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once this task is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete task') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    {{-- Default page --}}
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
