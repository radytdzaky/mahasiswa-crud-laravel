<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex gap-2">
                        <x-text-input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari NIM / Nama..." class="w-64" />
                        <x-secondary-button type="submit">{{ __('Cari') }}</x-secondary-button>
                    </form>

                    <a href="{{ route('mahasiswa.create') }}">
                        <x-primary-button type="button">{{ __('+ Tambah Mahasiswa') }}</x-primary-button>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">No</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">NIM</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Nama Mahasiswa</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Jenis Kelamin</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Program Studi</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Nomor HP</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-600 dark:text-gray-300">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($mahasiswas as $index => $mahasiswa)
                                <tr class="text-gray-700 dark:text-gray-300">
                                    <td class="px-4 py-3">{{ $mahasiswas->firstItem() + $index }}</td>
                                    <td class="px-4 py-3">{{ $mahasiswa->nim }}</td>
                                    <td class="px-4 py-3">{{ $mahasiswa->nama_mahasiswa }}</td>
                                    <td class="px-4 py-3">{{ $mahasiswa->jenis_kelamin }}</td>
                                    <td class="px-4 py-3">{{ $mahasiswa->program_studi }}</td>
                                    <td class="px-4 py-3">{{ $mahasiswa->nomor_hp }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('mahasiswa.show', $mahasiswa) }}">
                                                <x-secondary-button type="button">Detail</x-secondary-button>
                                            </a>
                                            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}">
                                                <x-secondary-button type="button">Edit</x-secondary-button>
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data {{ $mahasiswa->nama_mahasiswa }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit">Hapus</x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $mahasiswas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
