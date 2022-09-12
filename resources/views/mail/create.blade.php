<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mails
        </h2>
        <br>
        <a href="{{ route('mails.create') }}" style="color: deepskyblue">Create mail</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('mails.store') }}">
                        @csrf
                        @method('POST')

                        <div class="grid grid-cols-1 gap-1 text-center">
                            <label for="title" class="text-sm">Title</label>
                            <input type="text" id="title" placeholder="Title" name="title" class="rounded-md my-2"/>
                            @error('title') <span class="error">{{ $message }}</span> @enderror

                            <label for="content" class="text-sm">Content</label>
                            <textarea id="content" placeholder="Content" name="content" class="rounded-md my-1"></textarea>
                            @error('content') <span class="error">{{ $message }}</span> @enderror

                            <label for="recipients">Choose recipient/s:</label>
                            <select id="recipients" name="recipients[]" multiple>
                                @foreach ($recipients as $recipient)
                                    <option value="{{ $recipient->id }}">{{ $recipient->mail }}</option>
                                @endforeach
                            </select>
                            @error('recipients') <span class="error">{{ $message }}</span> @enderror

                            <button class="mt-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
