<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
                    <a href="/dashboard">Home</a>
                    <a href="/album">Tambah Album</a>
                    <a href="/foto">Tambah Foto</a>
                </nav>
                <div class="ml-auto">
                    <a href="{{ route('logout') }}"
                        class="bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50 p-2">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
    </div>

    <div class="container mx-auto px-4 py-8">
        @if ($albums->isNotEmpty())
            <h1 class="text-2xl font-semibold mb-4">Album</h1>
        @endif
        <div class="grid grid-cols-4 gap-4">
            @foreach ($albums as $album)
                <a href="{{ route('album.sort', ['id' => $album->id]) }}">
                    <div class="bg-gray-200 border border-gray-300 rounded-lg p-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $album->namaAlbum }}</h2>
                        <p class="text-gray-600">{{ $album->deskripsi }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        @if ($fotos->isNotEmpty())
            <h1 class="text-2xl font-semibold mb-4">Photos</h1>
        @endif
        <div class="grid grid-cols-4 gap-4">
            @foreach ($fotos as $foto)
                <div class="relative bg-gray-200 border border-gray-300 rounded-lg p-4">
                    <form action="{{ route('foto.destroy', ['id' => $foto->id]) }}" method="post"
                        onclick="return confirm('Apakah Anda yakin untuk menghapus foto ini??')">
                        @csrf
                        @method('DELETE')
                        <button
                            class="absolute top-0 right-0 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                            <i class="fas fa-trash mr-2"></i>
                            Delete
                        </button>
                    </form>
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
