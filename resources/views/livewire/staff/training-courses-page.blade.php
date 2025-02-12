<div>
    <h1 class="font-bold text-lg">Training Courses</h1>

    <div class="mb-9">
        @if (session()->has('success'))
            <div class="text-green-600 bg-green-100 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="text-red-600 bg-red-100 p-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 my-3">
            @foreach ($trainings as $training)
                <div class="bg-white border rounded-xl hover:bg-gray-50 overflow-hidden transition shadow-lg cursor-pointer" >
                    {{-- Image at the top --}}
                    <img src="{{asset($training->image)}}"
                        class="w-full h-40 object-cover rounded-t-xl hover:scale-105 transition duration-300 ease-in-out"
                        alt="{{ $training->title }}">

                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $training->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $training->description }}</p>

                        <div class="mt-4">
                            {{-- Trainer Chip (Click to Open Modal) --}}
                            <span
                                class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded"
                                @click="getTrainerInfo({{ $training->trainer->id }})">
                                Trainer: {{ $training->trainer->first_name }}
                            </span>

                        </div>

                        {{-- <x-button wire:click="openModal({{ $training->id }}">open<x-button> --}}

                    </div>
                </div>
            @endforeach
        </div>

        {{ $trainings->links() }}

        {{-- Trainer Info Modal --}}
        <x-modal id="courseModal" maxWidth="2xl" wire:model="showCourseModal">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Course Details</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ $training ? $training->title : 'No course selected' }}
                </p>

                <button wire:click="$set('showCourseModal', false)" class="mt-4 px-4 py-2 bg-gray-600 text-white rounded">
                    Close
                </button>
            </div>
        </x-modal>

    </div>
</div>
