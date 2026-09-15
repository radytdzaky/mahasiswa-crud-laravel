<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 dark:text-gray-300">
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">NIM</dt>
                        <dd class="mt-1">{{ $mahasiswa->nim }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Nama Mahasiswa</dt>
                        <dd class="mt-1">{{ $mahasiswa->nama_mahasiswa }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Tempat Lahir</dt>
                        <dd class="mt-1">{{ $mahasiswa->tempat_lahir }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Tanggal Lahir</dt>
                        <dd class="mt-1">{{ $mahasiswa->tanggal_lahir->format('d-m-Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Jenis Kelamin</dt>
                        <dd class="mt-1">{{ $mahasiswa->jenis_kelamin }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Program Studi</dt>
                        <dd class="mt-1">{{ $mahasiswa->program_studi }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Nomor HP</dt>
                        <dd class="mt-1">{{ $mahasiswa->nomor_hp }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Email</dt>
                        <dd class="mt-1">{{ $mahasiswa->email }}</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-sm font-semibold text-gray-500 dark:text-gray-400">Alamat</dt>
                        <dd class="mt-1">{{ $mahasiswa->alamat }}</dd>
                    </div>
                </dl>

                <div class="flex items-center justify-end gap-3 mt-6">
                    <a href="{{ route('mahasiswa.index') }}">
                        <x-secondary-button type="button">Kembali</x-secondary-button>
                    </a>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}">
                        <x-primary-button type="button">Edit</x-primary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
