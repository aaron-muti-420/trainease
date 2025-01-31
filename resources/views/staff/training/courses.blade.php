<x-app-layout>
    <x-slot name="header">
        <h2 class="font-light text-xs text-gray-400 dark:text-gray-200 leading-tight">
            {{ __('Training Courses') }}
        </h2>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View all training courses offered by Telecom Namibia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">

                @role('staff')
                    @livewire('staff.training-courses-page')
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>
