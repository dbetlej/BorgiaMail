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
                    <form method="POST" action="{{ route('recipients.update', ['recipient' => $recipient->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-1 text-center">
                            <p class="px-1 mb-4">ID: {{ $recipient->id }}</p>

                            <label for="title" class="text-sm">Title</label>
                            <input type="text" id="title" placeholder="Title" name="title" class="rounded-md my-2" value="{{ $recipient->title }}"/>
                            @error('title') <span class="error">{{ $message }}</span> @enderror

                            <label for="mail" class="text-sm">Mail</label>
                            <input type="email" id="mail" placeholder="Mail" name="mail" class="rounded-md my-1" value="{{ $recipient->mail }}"/>
                            @error('mail') <span class="error">{{ $message }}</span> @enderror

                            <label for="description" class="text-sm">Description</label>
                            <textarea id="description" placeholder="Description" name="description" class="rounded-md my-1">{{ $recipient->description }}</textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror

                            <button class="mt-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
