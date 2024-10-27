<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events Registrations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end items-center pb-4">
                        <a href="{{ route('admin.events.index') }}"
                            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            Events
                        </a>
                    </div>
                    <div class="flex items-center justify-center mb-[4.5rem]">
                        <table
                            class="w-full md:w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name</th>
                                    <td scope="col" class="px-6 py-3">{{ $event->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Date</th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ $event->event_date }}</th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Max Count</th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ $event->max_attendees }}</th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Registrations</th>
                                    <th scope="col" class="px-6 py-3">
                                        {{ $event->registrations->count() }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name</th>
                                    <th scope="col" class="px-6 py-3">
                                        Email</th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone</th>
                                </tr>
                            </thead>
                            @foreach ($registrations as $event)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $event->name }}</td>
                                    <td>{{ $event->email }}</td>
                                    <td>{{ $event->phone }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
