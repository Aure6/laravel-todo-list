<li>
    {{-- checkbox --}}
    <input type="checkbox" name="" class="inline-flex">

    {{-- description of the task --}}
    <div class="inline-flex flex-grow
        text-gray-700 text-sm text-justify">
        {{ $task->description }}
        {{-- {{ $task['description'] }} --}}
    </div>

    {{-- delete --}}
    <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="inline-flex">
        @csrf
        @method('DELETE')
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-task-deletion')"
            class="text-red-400">SUPPRIMER<i class="ri-delete-bin-7-line"></i></button>
    </form>
</li>
