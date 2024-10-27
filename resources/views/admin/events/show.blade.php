{{-- @extends('layouts.admin')

@section('content')
    <h1>Events</h1>
    <a href="{{ route('admin.events.create') }}">Create Event</a>
@endsection --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end items-center pb-4">
                        <a href="{{ route('admin.events.create') }}"
                            class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            Create
                        </a>
                    </div>
                    <div class="flex items-center justify-center">
                        <table class="w-full md:w-1/2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
