<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Attendance List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(Auth::user()->role === 'admin')
                <div class="mb-4">
                    <a href="/attendances/create"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        ➕ Add Attendance
                    </a>
                </div>
                @endif

                <table class="table-auto w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Employee</th>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Check In</th>
                            <th class="border px-4 py-2">Check Out</th>
                            <th class="border px-4 py-2">Status</th>

                            @if(Auth::user()->role === 'admin')
                                <th class="border px-4 py-2">Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($attendances as $attendance)
                        <tr>

                            <td class="border px-4 py-2">
                                {{ $attendance->user->name }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $attendance->date }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $attendance->check_in }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $attendance->check_out }}
                            </td>

                            <td class="border px-4 py-2">

                                @if($attendance->status == 'hadir')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                        Hadir
                                    </span>

                                @elseif($attendance->status == 'izin')
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">
                                        Izin
                                    </span>

                                @elseif($attendance->status == 'cuti')
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                        Cuti
                                    </span>

                                @else
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">
                                        Alpha
                                    </span>
                                @endif

                            </td>

                            @if(Auth::user()->role === 'admin')
                            <td class="border px-4 py-2">

                                <form action="{{ route('attendances.destroy', $attendance->id) }}"
                                      method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin hapus data ini?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
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