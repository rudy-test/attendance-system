<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Name</label>
                        <input type="text" name="name"
                               value="{{ $employee->name }}"
                               class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label>Email</label>
                        <input type="email" name="email"
                               value="{{ $employee->email }}"
                               class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label>Role</label>
                        <select name="role" class="w-full border p-2 rounded">
                            <option value="admin" {{ $employee->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="employee" {{ $employee->role == 'employee' ? 'selected' : '' }}>
                                Employee
                            </option>
                        </select>
                    </div>

                    <button type="submit"
                            class="bg-green-500 text-white px-4 py-2 rounded">
                        Update
                    </button>

                    <a href="/employees"
                       class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">
                        Cancel
                    </a>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>