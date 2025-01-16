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
        <h1 class="text-3xl font-bold text-center mb-8">Pemilihan Karyawan SAW</h1>

        <!-- Tambah Karyawan Button -->
        <div class="mb-6 text-center">
            <a href="{{ route('karyawans.create') }}"
                class="bg-green-500 text-white py-2 px-4 rounded shadow hover:bg-green-600">
                Tambah Karyawan
            </a>
        </div>

        <!-- Daftar Karyawan -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <h2 class="text-xl font-semibold text-gray-800 px-6 py-4 border-b">Daftar Karyawan</h2>
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Nama</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Pengalaman Kerja</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Pendidikan</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Umur</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Kepribadian</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($karyawans as $karyawan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $karyawan->nama }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->pengalaman_kerja }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->pendidikan }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->umur }}</td>
                            <td class="px-4 py-2 border">{{ $karyawan->kepribadian }}</td>
                            <td class="px-4 py-2 border">
                                <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus karyawan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white py-1 px-3 rounded shadow hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 border text-center text-gray-500">
                                Belum ada data karyawan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Hasil Prediksi -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-8">
            <h2 class="text-xl font-semibold text-gray-800 px-6 py-4 border-b">Hasil Prediksi</h2>
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Nama</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 border">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $result['nama'] }}</td>
                            <td class="px-4 py-2 border">{{ number_format($result['score'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
