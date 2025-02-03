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
                <div class="max-w-sm rounded-3xl overflow-hidden border bg-white p-6">
                    <div>
                        <img src='{{asset($training->image)}}'/>
                    </div>
                    <div class="px-4 py-3">
                        <h2 class="font-semibold text-lg text-gray-900">{{ $training->title }}</h2>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">{{ $training->description }}</p>
                        <p class="text-sm text-orange-600 bg-orange-200 rounded-lg p-2 mt-2">
                            <span class="font-bold">Trainer: </span> {{ $training->trainer->first_name }} {{ $training->trainer->last_name }}
                        </p>

                        @if(in_array($training->id, $userEnrollments))
                            <button class="mt-4 px-4 py-2 w-full text-white bg-gray-400 rounded-lg border cursor-not-allowed">
                                Already Enrolled
                            </button>
                        @else
                            <button
                                class="mt-4 px-4 py-2 w-full text-white bg-slate-700 rounded-lg border hover:bg-slate-800 transition duration-300 ease-in-out"
                                wire:click="enroll({{ $training->id }})">
                                Enroll
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        {{ $trainings->links() }}

    </div>
</div>
