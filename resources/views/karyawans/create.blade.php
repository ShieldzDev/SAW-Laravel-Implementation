<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Karyawan SAW</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-center mb-8">Tambah Karyawan</h1>

        <!-- Form Tambah Karyawan -->
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
            <form action="{{ route('karyawans.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Pengalaman Kerja -->
                <div>
                    <label for="pengalaman_kerja" class="block text-sm font-medium text-gray-700">Pengalaman Kerja
                        (tahun)</label>
                    <input type="number" id="pengalaman_kerja" name="pengalaman_kerja" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Pendidikan -->
                <div>
                    <label for="pendidikan" class="block text-sm font-medium text-gray-700">Pendidikan</label>
                    <select id="pendidikan" name="pendidikan" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                    </select>
                </div>

                <!-- Umur -->
                <div>
                    <label for="umur" class="block text-sm font-medium text-gray-700">Umur</label>
                    <input type="number" id="umur" name="umur" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Kepribadian -->
                <div>
                    <label for="kepribadian" class="block text-sm font-medium text-gray-700">Kepribadian</label>
                    <input type="text" id="kepribadian" name="kepribadian" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-indigo-600 text-white py-2 px-4 rounded shadow hover:bg-indigo-700 focus:ring focus:ring-indigo-400">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
