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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-3">
            @foreach ($trainings as $training)
            <a href="{{ route('training.show', Crypt::encrypt($training->id)) }}">
                <div class="bg-white border rounded-xl hover:bg-gray-50 overflow-hidden transition shadow-lg cursor-pointer">
                    <img src="{{ asset($training->image) }}"
                         class="w-full h-40 object-cover rounded-t-xl hover:scale-105 transition duration-300 ease-in-out"
                         alt="{{ $training->title }}">

                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $training->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $training->description }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{ $trainings->links() }}
</div>
