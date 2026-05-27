<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel AI Chat Settings</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-8">
    <h1 class="text-2xl font-bold mb-6">
        Laravel AI Chat Settings
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('ai-chat.settings.update') }}"
        class="space-y-6"
    >
        @csrf

        <div>
            <label class="block font-medium mb-2">
                AI Provider
            </label>

            <select
                name="provider"
                class="w-full border rounded-lg p-3"
            >
                <option value="openai"
                    {{ $settings->provider == 'openai' ? 'selected' : '' }}>
                    OpenAI
                </option>

                <option value="gemini"
                    {{ $settings->provider == 'gemini' ? 'selected' : '' }}>
                    Gemini
                </option>

                <option value="claude"
                    {{ $settings->provider == 'claude' ? 'selected' : '' }}>
                    Claude
                </option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-2">
                API Key
            </label>

            <textarea
                name="api_key"
                rows="3"
                class="w-full border rounded-lg p-3"
            >{{ $settings->api_key }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-2">
                Model
            </label>

            <input
                type="text"
                name="model"
                value="{{ $settings->model }}"
                class="w-full border rounded-lg p-3"
            >
        </div>

        <div>
            <label class="block font-medium mb-2">
                System Prompt
            </label>

            <textarea
                name="system_prompt"
                rows="5"
                class="w-full border rounded-lg p-3"
            >{{ $settings->system_prompt }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-2">
                Welcome Message
            </label>

            <textarea
                name="welcome_message"
                rows="3"
                class="w-full border rounded-lg p-3"
            >{{ $settings->welcome_message }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-2">
                    Temperature
                </label>

                <input
                    type="number"
                    step="0.1"
                    name="temperature"
                    value="{{ $settings->temperature }}"
                    class="w-full border rounded-lg p-3"
                >
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Max Tokens
                </label>

                <input
                    type="number"
                    name="max_tokens"
                    value="{{ $settings->max_tokens }}"
                    class="w-full border rounded-lg p-3"
                >
            </div>
        </div>

        <div>
            <label class="block font-medium mb-2">
                Theme Color
            </label>

            <input
                type="color"
                name="theme_color"
                value="{{ $settings->theme_color }}"
            >
        </div>

        <div>
            <label class="block font-medium mb-2">
                Widget Position
            </label>

            <select
                name="widget_position"
                class="w-full border rounded-lg p-3"
            >
                <option value="right"
                    {{ $settings->widget_position == 'right' ? 'selected' : '' }}>
                    Right
                </option>

                <option value="left"
                    {{ $settings->widget_position == 'left' ? 'selected' : '' }}>
                    Left
                </option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-2">
                Chat Title
            </label>

            <input
                type="text"
                name="chat_title"
                value="{{ $settings->chat_title }}"
                class="w-full border rounded-lg p-3"
            >
        </div>

        <div class="space-y-3">
            <label class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="enabled"
                    {{ $settings->enabled ? 'checked' : '' }}
                >
                Enable Widget
            </label>

            <label class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="lead_capture"
                    {{ $settings->lead_capture ? 'checked' : '' }}
                >
                Enable Lead Capture
            </label>

            <label class="flex items-center gap-2">
                <input
                    type="checkbox"
                    name="save_chat_history"
                    {{ $settings->save_chat_history ? 'checked' : '' }}
                >
                Save Chat History
            </label>
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-6 py-3 rounded-lg"
        >
            Save Settings
        </button>
    </form>
</div>

</body>
</html>