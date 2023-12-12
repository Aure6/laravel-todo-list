<li>
    {{-- checkbox --}}
    <input type="checkbox" name="">

    {{-- description of the task --}}
    <div class="flex-grow text-gray-700 text-sm text-justify">
        {{ $task->description }}
        {{-- {{ $task['description'] }} --}}
    </div>

    {{-- delete --}}
    <form action="{{ route('task.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="text-red-400">SUPPRIMER<i class="ri-delete-bin-7-line"></i></button>
    </form>
</li>
