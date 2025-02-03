<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-3">
        <!-- Course Title -->
        <div class="text-start mb-8 text-black">
            <h1 class="text-4xl font-bold">{{ $training->title }}</h1>
            <p class="mt-2">{{ $training->description }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Course Content -->
            <div class="bg-white border rounded-3xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Course Content</h2>
                    <div class="mt-4">
                        <ul class="space-y-4">
                            @foreach ($courseContent as $contentItem)
                                <li
                                    class="flex items-center justify-between p-4 bg-gray-100 rounded-lg transition duration-200 hover:bg-gray-200">
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-700">{{ $contentItem['title'] }}</h3>
                                        <p class="text-gray-500 text-xs">{{ $contentItem['type'] }}</p>
                                    </div>
                                    @if ($contentItem['type'] === 'Video')
                                        <button
                                            class="ml-4 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-blue-600 transition duration-200"
                                            onclick="loadContent('{{ $contentItem['video_url'] }}', 'video')">
                                            View
                                        </button>
                                    @elseif($contentItem['type'] === 'Text')
                                        <button
                                            class="ml-4 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-green-600 transition duration-200"
                                            onclick="loadContent(`{{ addslashes($contentItem['content']) }}`, 'text')">
                                            View
                                        </button>
                                    @elseif($contentItem['type'] === 'Quiz')
                                        <button
                                            class="ml-4 px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-yellow-600 transition duration-200"
                                            onclick="loadContent({{ json_encode($contentItem['questions']) }}, 'quiz')">
                                            View
                                        </button>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Current Content Display -->
            <div class="col-span-3">
                <h3 class="text-lg font-semibold text-gray-800">Current Content</h3>
                <div id="currentContent" class="relative aspect-video mt-2">
                    <iframe id="currentVideo" class="w-full h-full rounded-3xl border hidden" src=""
                        allowfullscreen></iframe>
                    <div id="currentText" class="hidden p-4 bg-gray-100 rounded-3xl"></div>
                    <div id="currentQuiz" class="hidden p-4 bg-gray-100 border rounded-3xl"></div>
                </div>
            </div>

            <!-- Mark Course as Completed -->
            <div class="mt-8 text-center">
                {{-- @if ($enrollment->status !== 'completed')
                <form method="POST" action="{{ route('courses.complete', $training->id) }}">
                    @csrf
                    <button type="submit" class="px-8 py-3 bg-green-500 text-white font-semibold rounded-3xl border-md hover:bg-green-600 transition duration-200">
                        Mark as Completed
                    </button>
                </form>
                @else
                <p class="text-green-600 font-semibold">✅ You have completed this course!</p>
                <a href="{{ route('certificates.download', $training->id) }}" class="mt-4 inline-block px-8 py-3 bg-blue-500 text-white font-semibold rounded-3xl border-md hover:bg-blue-600 transition duration-200">
                    Download Certificate
                </a>
                @endif --}}
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Check if courseContent is available
                let firstContent = @json($courseContent[0] ?? null);

                if (firstContent) {
                    if (firstContent.type === "Video") {
                        loadContent(firstContent.video_url, "video");
                    } else if (firstContent.type === "Text") {
                        loadContent(firstContent.content, "text");
                    } else if (firstContent.type === "Quiz") {
                        loadContent(firstContent.questions, "quiz");
                    }
                }
            });

            function loadContent(content, type) {
                document.getElementById('currentVideo').classList.add('hidden');
                document.getElementById('currentText').classList.add('hidden');
                document.getElementById('currentQuiz').classList.add('hidden');

                if (type === 'video') {
                    document.getElementById('currentVideo').src = content;
                    document.getElementById('currentVideo').classList.remove('hidden');
                } else if (type === 'text') {
                    document.getElementById('currentText').innerText = content;
                    document.getElementById('currentText').classList.remove('hidden');
                } else if (type === 'quiz') {
                    startQuiz(content);
                }
            }

            function startQuiz(questions) {
                let quizHtml = '<h4 class="font-semibold text-gray-800">Quiz</h4>';
                questions.forEach((question, index) => {
                    quizHtml += `<div class="mt-2">
                                    <p>${index + 1}. ${question.question}</p>`;
                    question.options.forEach(option => {
                        quizHtml += `<label class="block">
                                        <input type="radio" name="question${index}" value="${option}">
                                        ${option}
                                     </label>`;
                    });
                    quizHtml += '</div>';
                });
                quizHtml += `<button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200"
                            onclick="submitQuiz(${JSON.stringify(questions)})">Submit Quiz</button>`;

                document.getElementById('currentQuiz').innerHTML = quizHtml;
                document.getElementById('currentQuiz').classList.remove('hidden');
            }

            function submitQuiz(questions) {
                let score = 0;
                questions.forEach((question, index) => {
                    const selectedOption = document.querySelector(`input[name="question${index}"]:checked`);
                    if (selectedOption && selectedOption.value === question.correct_answer) {
                        score++;
                    }
                });

                alert(`Your score is ${score} out of ${questions.length}`);
                document.getElementById('currentQuiz').classList.add('hidden');
            }
        </script>
</x-app-layout>
