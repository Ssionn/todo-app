<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold pl-4">Todos</h1>

                    <form action="{{ route('dashboard.store') }}" method="POST">
                        @csrf

                        <div class="p-4">
                            <input id="todo" name="todo" class="rounded-xl border-gray-200"/>
                        </div>
                    </form>

                    <div class="p-4 flex flex-col space-y-4">
                        @foreach($todos as $todo)
                            <div class="inline-flex justify-between bg-gradient-to-r from-gray-100 to-red-200 rounded-md p-4">
                                {{ $todo->title }}

                                <div class="">
                                    <form action="{{ route('dashboard.delete', $todo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
