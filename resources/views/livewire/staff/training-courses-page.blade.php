<div x-data="{ show: false, selectedCourse: {} }">
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
                <div class="bg-white border rounded-xl hover:bg-gray-50 overflow-hidden transition shadow-lg cursor-pointer"
                     x-on:click="selectedCourse = {
                         title: '{{ $training->title }}',
                         training_type: '{{ $training->training_type }}',
                         description: '{{ $training->description }}',
                         image: '{{ asset($training->image) }}',
                         location: '{{ $training->location }}',
                         start_date: '{{ $training->start_date }}',
                         end_date: '{{ $training->end_date }}',
                         materials: @json($training->courseMaterials)
                     }; show = true">
                    <img src="{{ asset($training->image) }}"
                         class="w-full h-40 object-cover rounded-t-xl hover:scale-105 transition duration-300 ease-in-out"
                         alt="{{ $training->title }}">

                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $training->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $training->description }}</p>
                    </div>

                </div>

            @endforeach
        </div>
    </div>

        {{ $trainings->links() }}

        {{-- Training Details Modal --}}
        <x-modal id="courseModal" maxWidth="2xl" x-show="show">
            <div class="p-6">
                <img :src="selectedCourse.image" class="w-full h-40 object-cover rounded-xl mb-8" alt="Course Image">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100" x-text="selectedCourse.title"></h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400" x-text="selectedCourse.description"></p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Type: <span
                        x-text="selectedCourse.training_type"></span></p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Location: <span
                        x-text="selectedCourse.location"></span></p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Start Date: <span
                        x-text="selectedCourse.start_date"></span></p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">End Date: <span
                        x-text="selectedCourse.end_date"></span></p>

                <h3 class="mt-4 text-lg font-semibold">Course Materials</h3>
                <ul class="list-disc pl-5">
                    <template x-for="material in selectedCourse.materials" :key="material.id">
                        <li x-text="material.material_name"></li>
                    </template>
                </ul>

                <button @click="show = false" class="mt-4 px-4 py-2 bg-gray-600 text-white rounded">
                    Close
                </button>
            </div>
        </x-modal>
    </div>
</div>
