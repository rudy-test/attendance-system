<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            <form action="/employees" method="POST">

                @csrf

                <div class="mb-4">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           class="border p-2 w-full">
                </div>

                <div class="mb-4">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="border p-2 w-full">
                </div>

                <div class="mb-4">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           class="border p-2 w-full">
                </div>

                <div class="mb-4">
                    <label>Role</label>

                    <select name="role"
                            class="border p-2 w-full">

                        <option value="employee">
                            Employee
                        </option>

                        <option value="admin">
                            Admin
                        </option>

                    </select>
                </div>

                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded">
                    Save Employee
                </button>

            </form>

        </div>
    </div>
</x-app-layout>