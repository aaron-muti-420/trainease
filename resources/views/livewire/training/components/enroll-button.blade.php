<div>
    <div>
        @if($isEnrolled)
            <button class="mt-2 px-6 py-2 bg-gray-500 text-white font-semibold rounded-lg cursor-not-allowed" disabled>
                Enrolled
            </button>
        @else
            <button wire:click="enroll" class="mt-2 px-6 py-2 bg-white text-black font-semibold rounded-lg hover:bg-gray-300">
                Enroll Now
            </button>
        @endif
    </div>

</div>
