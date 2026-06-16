<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Attendance
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

            <form action="/attendances" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Employee</label>

                    <select name="user_id" class="border p-2 w-full">

                        @foreach($employees as $employee)

                        <option value="{{ $employee->id }}">
                            {{ $employee->name }}
                        </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Date</label>
                    <input type="date"
                           name="date"
                           class="border p-2 w-full">
                </div>

                <div class="mb-3">
                    <label>Check In</label>
                    <input type="time"
                           name="check_in"
                           class="border p-2 w-full">
                </div>

                <div class="mb-3">
                    <label>Check Out</label>
                    <input type="time"
                           name="check_out"
                           class="border p-2 w-full">
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status"
                            class="border p-2 w-full">

                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="cuti">Cuti</option>
                        <option value="alpha">Alpha</option>

                    </select>
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                    SAVE ATTENDANCE
                </button>

            </form>

        </div>
    </div>
</x-app-layout>