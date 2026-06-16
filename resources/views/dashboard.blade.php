<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Attendance System
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6">
                    <h3 class="text-lg font-bold">
                        Welcome, {{ Auth::user()->name }}
                    </h3>

                    <p class="mt-2">
                        Role: <strong>{{ Auth::user()->role }}</strong>
                    </p>
                </div>
            </div>



            @if(Auth::user()->role == 'admin')

            <div class="grid grid-cols-3 gap-4 mb-4">

                <div class="bg-blue-100 p-6 rounded shadow">
                    <h3 class="font-bold">Employees</h3>
                    <p class="text-3xl">{{ $totalEmployees }}</p>
                </div>

                <div class="bg-green-100 p-6 rounded shadow">
                    <h3 class="font-bold">Admins</h3>
                    <p class="text-3xl">{{ $totalAdmins }}</p>
                </div>

                <div class="bg-yellow-100 p-6 rounded shadow">
                    <h3 class="font-bold">Attendance Records</h3>
                    <p class="text-3xl">{{ $totalAttendance }}</p>
                </div>

            </div>

            @else

            <div class="grid grid-cols-1 gap-4 mb-4">

                <div class="bg-green-100 p-6 rounded shadow">
                    <h3 class="font-bold">My Attendance Records</h3>
                    <p class="text-3xl">{{ $totalAttendance }}</p>
                </div>

            </div>

            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-bold mb-4">
                        Quick Menu
                    </h3>

                    <div class="flex gap-4">

                        @if(Auth::user()->role == 'admin')
                        <a href="/employees"
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                            Employees
                        </a>
                        @endif

                        <a href="/attendances"
                           class="bg-green-500 text-white px-4 py-2 rounded">
                            Attendance
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>