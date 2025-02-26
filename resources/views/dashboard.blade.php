<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer group">
                                        <div class="flex items-center">
                                            Title
                                            <svg class="w-4 h-4 ml-1 text-gray-400 opacity-0 group-hover:opacity-100"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer group">
                                        <div class="flex items-center">
                                            Location
                                            <svg class="w-4 h-4 ml-1 text-gray-400 opacity-0 group-hover:opacity-100"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Equipments</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Availabilities</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Owner ID</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer group">
                                        <div class="flex items-center">
                                            Price
                                            <svg class="w-4 h-4 ml-1 text-gray-400 opacity-0 group-hover:opacity-100"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="announcementsTable">
                                @foreach ($Annonces as $announce)
                                <tr class="transition-colors hover:bg-gray-50"
                                    data-location="{{ $announce->localisation }}" data-price="{{ $announce->prix }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">{{ $announce->titre }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $announce->localisation }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">
                                            @php
                                            $equipments = explode('@', $announce->equipements);
                                            @endphp
                                            <div class="flex flex-wrap gap-1">
                                                @foreach ($equipments as $equipment)
                                                <span
                                                    class="px-2 py-1 text-xs text-blue-800 bg-blue-100 rounded-full">{{ $equipment }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $announce->disponibilites }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $announce->proprietaire->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            ${{ number_format($announce->prix, 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <form action="/DeleteAnnounce/{{ $announce->id }}" method="POST"
                                                onclick="return confirm('etes vous sur de vouloir supprimer cette annonce ?')"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 focus:outline-none">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- No results message -->
                    <div id="noResults" class="hidden py-8 text-center text-gray-500">
                        No announcements match your search criteria
                    </div>

                    <!-- Pagination (if needed) -->
                    <div class="flex items-center justify-between mt-4">
                        {{ $Annonces->links() }}
                    </div>
                </div>
            </div>

            <div class="mt-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="mt-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900">Statistics</h2>
                        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="p-4 rounded-lg shadow bg-blue-50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-blue-900">Total Favorites</h3>
                                        <p class="mt-1 text-2xl font-bold text-blue-900">{{ $NbrFavorites }}</p>
                                    </div>
                                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg shadow bg-green-50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-green-900">Total Users</h3>
                                        <p class="mt-1 text-2xl font-bold text-green-900">{{ $NbrUsers }}</p>
                                    </div>
                                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14v7m0 0l-3-3m3 3l3-3"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4 rounded-lg shadow bg-yellow-50">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-yellow-900">Total Announces</h3>
                                        <p class="mt-1 text-2xl font-bold text-yellow-900">{{ $NbrTotalAnnonce }}</p>
                                    </div>
                                    <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M5 7V5a2 2 0 012-2h10a2 2 0 012 2v2m-4 4h4l1 9H4l1-9h4m4 0v9"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
</x-app-layout>