<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">Orders</h3>
                            <p class="text-gray-600">You have 12 orders waiting to be processed</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">Products</h3>
                            <p class="text-gray-600">You have 12 products in stock</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">Customers</h3>
                            <p class="text-gray-600">You have 12 customers registered</p>
                        </div>
                    </div>
                </div>
                <div class="h-6 bg-gray-100">

                </div>
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">Orders</h3>
                            <p class="text-gray-600">You have 12 orders waiting to be processed</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">Products</h3>
                            <p class="text-gray-600">You have 12 products in stock</p>
                        </div>
                        <div class="p-4 bg-white rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-800">Customers</h3>
                            <p class="text-gray-600">You have 12 customers registered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>