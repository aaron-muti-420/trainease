<div>
    <main class="p-6 w-5/6">
        <div>
            @if ($selectedMaterial)
                @if ($selectedMaterial->isVideo())
                    <iframe src="{{ $selectedMaterial->material_url }}" allowfullscreen></iframe>
                @elseif ($selectedMaterial->isText())
                    <div>{{ nl2br(e($selectedMaterial->material_content)) }}</div>
                @elseif ($selectedMaterial->isQuiz())
                    {{$selectedMaterial}}
                @else
                    <p>Unsupported content type.</p>
                @endif

                <!-- Load Next Material Button -->
                <button wire:click="loadPreviousMaterial" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
                    Back
                </button>
                <button wire:click="loadNextMaterial" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
                    Load Next Content
                </button>

            @else
                <p>Select a material to view content.</p>
            @endif
        </div>
    </main>
</div>
