<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Tutor</title>

    @vite(['resources/css/app.css'])

    @livewireStyles
</head>
<body>
    <div class="mx-auto max-w-3xl space-y-6 p-6">
        <header>
            <h1 class="text-4xl font-semibold">Welcome to Laravel Tutor Chat</h1>
            <p class="mt-2 text-gray-600">Start chatting with your Laravel Tutor below.</p>
        </header>

        <livewire:chat />
    </div>

    @livewireScripts
</body>
</html>