<x-app-layout>
    <x-slot name="header">
        <h2 class="font-light text-xs text-gray-400 dark:text-gray-200 leading-tight">
            {{ __('Your Trainings') }}
        </h2>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses you are enrolled in') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden border sm:rounded-3xl p-6">
                @livewire('staff.my-trainings')
            </div>
        </div>
    </div>
</x-app-layout>
