<div>
    <h1 class="font-bold text-lg">
        Training Courses
    </h1>
    <div class="mb-9">

        <div class="flex grid grid-cols-3 gap-12 my-3">
    @foreach ($trainings as $training)


    <div class="max-w-sm rounded-3xl overflow-hidden border bg-white p-6">
        <div class="px-4 py-3">
            <h2 class="font-semibold text-lg text-gray-900">{{$training->title}}</h2>
            <p class="text-sm text-gray-600 mt-2 line-clamp-3">{{$training->description}}</p>
            <p class="text-sm text-orange-600 bg-orange-200 rounded-lg p-2 mt-2 line-clamp-3 "><span class="font-bold">Trainer: </span> {{$training->trainer->first_name}} {{$training->trainer->last_name}}</p>

            <button class="mt-4 px-4 py-2 w-full text-white bg-slate-700 rounded-lg shadow-md hover:bg-slate-800 transition duration-300 ease-in-out">
                Enroll
            </button>
        </div>
    </div>


    @endforeach
</div>
</div>
</div>
