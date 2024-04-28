<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery Foto || Attariq</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex items-center py-4">
                <div>
                    <a href="/" class="text-xl font-semibold text-gray-800">Gallery Foto Attariq</a>
                </div>
                <nav class="space-x-4 ml-5 text-gray-600">
                    @auth
                        <a href="/dashboard">Home</a>
                        <a href="/album">Tambah Album</a>
                        <a href="/foto">Tambah Foto</a>
                    @endauth
                </nav>
                <div class="ml-auto">
                    @guest
                        <a href="{{ route('login') }}"
                            class="bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50 p-3">Login</a>
                        <a href="{{ route('register') }}"
                            class="ml-2 text-white py-2 bg-blue-400 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50 p-3">Register</a>
                    @else
                        <a href="{{ route('logout') }}"
                            class="bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50 p-2">Logout</a>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8">
        @if ($fotos->isNotEmpty())
            <h1 class="text-2xl font-semibold mb-4">Photos</h1>
        @endif
        <div class="grid grid-cols-4 gap-4">
            @foreach ($fotos as $foto)
                <div class="relative bg-gray-200 border border-gray-300 rounded-lg p-4">
                    <img src="{{ $foto->lokasiFile }}" alt="" class="w-full">
                    <h2 class="text-lg font-semibold">{{ $foto->judulFoto }}</h2>
                    <p class="text-gray-600">{{ $foto->deskripsiFoto }}</p>
                    <p class="mb-2 mt-2">{{ $likeCounts[$foto->id] }} <i
                            class="fas fa-thumbs-up mr-2 text-blue-500"></i>
                    </p>
                    <div class="flex justify-between mt-4">
                        <form action="{{ route('like', ['id' => $foto->id]) }}" method="post">
                            @csrf
                            <button
                                class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-thumbs-up mr-2"></i>
                                Like
                            </button>
                        </form>
                        <a href="{{ route('komentar', ['id' => $foto->id]) }}"
                            class="flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-comment mr-2"></i>
                            Comment</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
