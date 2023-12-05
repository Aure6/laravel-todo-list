<li>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <form action="{{ route('task.add', $task->id) }}"method="POST"></form>
    @csrf
    @method('DELETE')
    <div class="flex-grow text-gray-700 text-sm text-justify">
        {{ $task->description }}
    </div>
    <button type="submit" class="text-red-400">{{-- TODO icône de checkbox --}}</button>
    <button type="submit" class="text-red-400">Delete</button>
</li>
