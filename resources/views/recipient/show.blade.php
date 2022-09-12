<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Recipients
        </h2>
        <br>
        <a href="{{ route('recipients.create') }}" style="color: deepskyblue">Create recipient</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 gap-1 text-center">
                        <p>ID: {{ $recipient->id }}</p>
                        <p>Title: {{ $recipient->title }}</p>
                        <p>Mail: {{ $recipient->mail }}</p>
                        <p>Description: {{ $recipient->description }}</p>
                        <a href="{{ route('recipients.edit', $recipient->id) }}" class="text-indigo-600 mt-8">Edit</a>
                        <form action="{{ route('recipients.destroy', $recipient->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: tomato">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
