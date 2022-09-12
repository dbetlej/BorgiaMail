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
                    <div class="grid grid-cols-1 gap-1 text-center">
                        <p>ID: {{ $mail->id }}</p>
                        <p>Creator ID: {{ $mail->creator_id }}</p>
                        <p>Title: {{ $mail->title }}</p>
                        <p>Content: {{ $mail->content }}</p>
                        <p>Recipient: {{ $mail->recipient }}</p>
                        <a href="{{ route('mails.edit', $mail->id) }}" class="text-indigo-600 mt-8">Edit</a>
                        <form action="{{ route('mails.destroy', $mail->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" style="color: tomato">Delete</button>
                        </form>
                        <form action="{{ route('send.data', $mail->id) }}" method="POST" class="grid grid-cols-1 gap-1 text-center">
                            @csrf

                            <button type="submit" style="color: darkolivegreen">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
