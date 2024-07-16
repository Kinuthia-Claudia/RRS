<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Reservation</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <div class="flex justify-between items-center p-4 bg-gray-50 dark:bg-gray-700">
                                <div>
                                    <form method="GET" action="{{ route('admin.reservations.index') }}">
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="">All</option>
                                            <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Date
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Table
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Guests
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Status
                                        </th>
                                        <th scope="col" class="relative py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $reservation->first_name }} {{ $reservation->last_name }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $reservation->email }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $reservation->res_date }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $reservation->table->name }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $reservation->guest_number }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ $reservation->status }}
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}"
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                        method="POST"
                                                        action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                    <form class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-white"
                                                        method="POST"
                                                        action="{{ route('admin.reservations.changeStatus', $reservation->id) }}">
                                                        @csrf
                                                        <button type="submit">
                                                            {{ $reservation->status == 'closed' ? 'Open' : 'Close' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservation Settings -->
            <form action="{{ route('admin.update_reservation_settings') }}" method="POST" class="space-y-4 mt-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="min_date" class="block text-sm font-medium text-gray-700">Min Reservation Date</label>
                        <input type="datetime-local" id="min_date" name="min_date"
                               value="{{ optional($settings->min_date)->format('Y-m-d\TH:i:s') }}"
                               class="mt-1 block w-full border border-gray-400 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="max_date" class="block text-sm font-medium text-gray-700">Max Reservation Date</label>
                        <input type="datetime-local" id="max_date" name="max_date"
                               value="{{ optional($settings->max_date)->format('Y-m-d\TH:i:s') }}"
                               class="mt-1 block w-full border border-gray-400 rounded-md shadow-sm p-2">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Save Settings</button>
                </div>
            </form>

        </div>
    </div>
</x-admin-layout>
