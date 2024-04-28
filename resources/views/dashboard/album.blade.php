<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Album</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container w-50  mx-auto px-4 py-12">
        <h1 class="text-2xl font-semibold mb-4">Tambah Album</h1>
        <form action="{{ route('album.post') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Album</label>
                <input type="text" id="name" name="namaAlbum"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    placeholder="Nama Album" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" placeholder="Deskripsi" name="deskripsi" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required></textarea>
            </div>
            <button type="submit"
                class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">Simpan</button>
        </form>
    </div>
</body>

</html>
