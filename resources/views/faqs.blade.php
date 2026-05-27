<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>AI FAQs</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-5xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            AI FAQs
        </h1>

        <p class="text-gray-500 mt-1">
            Manage frequently asked
            questions for AI responses.
        </p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100
                    border border-green-200
                    text-green-700
                    px-5 py-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add FAQ Card -->
    <div class="bg-white rounded-2xl
                shadow-sm p-8 mb-8">

        <h2 class="text-xl font-semibold
                   mb-6 text-gray-800">
            Add FAQ
        </h2>

        <form method="POST"
              class="space-y-5">
            @csrf

            <!-- Question -->
            <div>
                <label class="block
                             text-sm
                             font-medium
                             text-gray-700
                             mb-2">
                    Question
                </label>

                <input
                    type="text"
                    name="question"
                    placeholder="Enter question..."
                    class="w-full rounded-xl
                           border border-gray-300
                           px-4 py-3
                           focus:outline-none
                           focus:ring-2
                           focus:ring-blue-500"
                >
            </div>

            <!-- Answer -->
            <div>
                <label class="block
                             text-sm
                             font-medium
                             text-gray-700
                             mb-2">
                    Answer
                </label>

                <textarea
                    name="answer"
                    rows="5"
                    placeholder="Enter answer..."
                    class="w-full rounded-xl
                           border border-gray-300
                           px-4 py-3
                           focus:outline-none
                           focus:ring-2
                           focus:ring-blue-500"
                ></textarea>
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="bg-blue-600
                       hover:bg-blue-700
                       text-white
                       px-6 py-3
                       rounded-xl
                       font-medium
                       transition">
                Save FAQ
            </button>
        </form>
    </div>

    <!-- FAQ List -->
    <div class="space-y-5">

        <h2 class="text-xl font-semibold
                   text-gray-800">
            Existing FAQs
        </h2>

        @forelse($faqs as $faq)

            <div class="bg-white
                        rounded-2xl
                        shadow-sm
                        p-6
                        border
                        border-gray-100">

                <div class="flex
                            justify-between
                            items-start
                            gap-4">

                    <div>
                        <h3 class="font-semibold
                                   text-lg
                                   text-gray-800">
                            {{ $faq->question }}
                        </h3>

                        <p class="text-gray-600
                                  mt-3 leading-7">
                            {{ $faq->answer }}
                        </p>
                    </div>

                </div>
            </div>

        @empty

            <div class="bg-white
                        rounded-2xl
                        shadow-sm
                        p-8 text-center
                        text-gray-500">
                No FAQs added yet.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>