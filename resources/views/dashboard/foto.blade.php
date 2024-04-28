<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container w-50  mx-auto px-4 py-12">
        <h1 class="text-2xl font-semibold mb-4">Tambah Foto</h1>
        <form action="{{ route('foto.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Judul Foto</label>
                <input type="text" id="name" name="judulFoto"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    placeholder="Judul Foto" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" placeholder="Deskripsi Foto" name="deskripsiFoto" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required></textarea>
            </div>
            <div class="mb-4">
                <label for="albumId" class="block text-sm font-medium text-gray-700">Album</label>
                <select name="albumId" id="albumId"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->namaAlbum }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Lokasi Foto</label>
                <input type="file" id="foto" name="lokasiFile"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <button type="submit"
                class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">Simpan</button>
        </form>
    </div>
</body>

</html>
