<div>
    @if($enrollments->isEmpty())
        <p class="text-gray-600 dark:text-gray-400">You are not enrolled in any courses yet.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($enrollments as $enrollment)
                <div class="bg-white border p-6 rounded-3xl border hover:bg-gray-100 transition">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $enrollment->training->title }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ $enrollment->training->description }}</p>
                    <p class="text-sm font-medium text-gray-700 mt-2">
                        Location: {{ $enrollment->training->location }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Starts: {{ \Carbon\Carbon::parse($enrollment->training->start_date)->format('M d, Y') }}
                    </p>
                    <p class="text-sm text-gray-500">
                        Ends: {{ \Carbon\Carbon::parse($enrollment->training->end_date)->format('M d, Y') }}
                    </p>
                    <span class="text-xs font-medium mt-2 px-3 py-1 rounded bg-blue-500 text-white">
                        {{ ucfirst($enrollment->status) }}
                    </span>

                    <!-- Start Course Button -->
                    @if($enrollment->status === 'approved' || $enrollment->status === 'completed')
                        <a href="{{ route('start.course', $enrollment->training->id) }}"
                           class="mt-4 block px-4 py-2 text-center text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700 transition duration-300 ease-in-out">
                            Start Course
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
