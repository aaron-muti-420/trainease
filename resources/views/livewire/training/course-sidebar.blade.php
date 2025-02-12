<div class="flex h-auto">
    <!-- Sidebar -->
    <aside class="w-4/6 bg-white border-r p-4 overflow-y-auto">

        <div>
            <h2 class="text-3xl text-gray-700 font-bold">{{ $training->title }}</h2>
            <ul class="mb-12">
                @foreach ($materials as $material)
                    <li wire:click="loadMaterial('{{ $material->id }}')"
                        class="cursor-pointer rounded-lg border p-2 my-2 text-sm
                        {{ in_array($material->id, $material->isCompletedByUser(Auth::user()->id)) ? 'bg-green-100 text-green-700' : 'bg-gray-50 text-gray-700' }}">
                        {{ $material->material_name }}

                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>
