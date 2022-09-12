<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Recipients
        </h2>
        <br>
        <a href="{{ route('recipients.create') }}" class="text-indigo-600">Create recipient</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Mail</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recipients as $recipient)
                            <tr class="text-center">
                                <td> <a href="{{ route('recipients.show', $recipient->id) }}" class="text-indigo-600 font-weight-bold">{{ $recipient->id }}</a></td>
                                <td>{{ $recipient->title }}</td>
                                <td>{{ $recipient->mail }}</td>
                                <td>{{ $recipient->description }}</td>
                                <td> <a href="{{ route('recipients.edit', $recipient->id) }}" style="color: cornflowerblue" class="px-1">Edit</a> </td>
                                <td>
                                    <form action="{{ route('recipients.destroy', $recipient->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: tomato" class="px-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $recipients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
