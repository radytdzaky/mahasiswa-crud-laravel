<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}">
                    @csrf
                    @method('PUT')

                    @include('mahasiswa._form')

                    <div class="flex items-center justify-end gap-3 mt-6">
                        <a href="{{ route('mahasiswa.index') }}">
                            <x-secondary-button type="button">Batal</x-secondary-button>
                        </a>
                        <x-primary-button type="submit">Perbarui</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
