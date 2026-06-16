<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(auth()->user()->role == 'admin')
                <div class="mb-4">
                    <a href="/employees/create"
                       class="bg-blue-500 text-white px-4 py-2 rounded">
                        ➕ Add Employee
                    </a>
                </div>
                @endif

                <table class="table-auto w-full border">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Role</th>

                            @if(auth()->user()->role == 'admin')
                            <th class="border px-4 py-2">Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($employees as $employee)

                        <tr>
                            <td class="border px-4 py-2">
                                {{ $employee->id }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $employee->name }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $employee->email }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $employee->role }}
                            </td>

                            @if(auth()->user()->role == 'admin')
                            <td class="border px-4 py-2">

                                <a href="{{ route('employees.edit', $employee->id) }}"
                                   class="bg-yellow-500 text-white px-2 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('employees.destroy', $employee->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin mau hapus?')"
                                            class="bg-red-500 text-white px-2 py-1 rounded">
                                        Delete
                                    </button>

                                </form>

                            </td>
                            @endif

                        </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>