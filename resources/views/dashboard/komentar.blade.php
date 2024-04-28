<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Comments</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-lg">
        <!-- Photo Section -->
        <a href="/dashboard" class="text-indigo-500">BACK</a>
        <div class="mb-6">
            <img src="{{ $foto->lokasiFile }}" alt="Photo" class="w-full rounded">
            <h2 class="text-lg font-semibold">{{ $foto->judulFoto }}</h2>
            <h4 class="text-gray-600">{{ $foto->deskripsiFoto }}</h4>
            <hr>
        </div>
        <!-- Comments Section -->
        <div class="space-y-4">
            <h1 class="text-lg font-semibold"> Komentar :</h1>
            <!-- Single Comment -->
            @foreach ($komentar as $komen)
                <div class="flex items-center space-x-2">
                    <div>
                        <p class="font-bold">{{ $komen->user->name }}</p>
                        <p class="text-gray-600 text-sm">{{ $komen->komentar }}</p>
                    </div>
                </div>
            @endforeach
            @if ($komentar->isEmpty())
                <h2 class="text-lg font-semibold">Tidak ada Komentar Yang tersedia</h2>
            @endif
            <!-- Add Comment Form -->
            <form class="flex items-center space-x-2" method="POST"
                action="{{ route('komentar.post', ['id' => $foto->id]) }}">
                @csrf
                <input type="text" name="komentar" placeholder="Add a comment..."
                    class="flex-1 px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Post</button>
            </form>
        </div>
    </div>
</body>

</html>
