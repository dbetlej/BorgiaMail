<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mails
        </h2>
        <br>
        <a href="{{ route('mails.create') }}" class="text-indigo-600">Create mail</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Creator ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Recipient</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mails as $mail)
                            <tr class="text-center">
                                <td> <a href="{{ route('mails.show', $mail->id) }}" class="text-indigo-600 font-weight-bold">{{ $mail->id }}</a></td>
                                <td>{{ $mail->creator_id }}</td>
                                <td>{{ $mail->title }}</td>
                                <td>{{ $mail->content }}</td>
                                <td>{{ $mail->recipient }}</td>
                                <td> <a href="{{ route('mails.edit', $mail->id) }}" style="color: cornflowerblue" class="px-1">Edit</a> </td>
                                <td>
                                    <form action="{{ route('mails.destroy', $mail->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: tomato" class="px-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $mails->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
