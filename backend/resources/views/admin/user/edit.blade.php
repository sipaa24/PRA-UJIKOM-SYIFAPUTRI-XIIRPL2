@extends('layouts.app')

@section('title', 'Edit User - Panel Admin')
@section('header-title', 'Edit Data Pengguna')

@section('content')

<div class="max-w-xl bg-white rounded-lg shadow-sm border border-gray-200 p-6">

    <form
        action="{{ route('admin.user.update', $user->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <!-- Nama Lengkap -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2">
                Nama Lengkap
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2">
                Password Baru
                <span class="text-xs text-gray-400 font-normal">
                    (Kosongkan jika tidak ingin mengubah password)
                </span>
            </label>

            <input
                type="password"
                name="password"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            @error('password')
                <span class="text-red-500 text-xs">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2">
                Role / Hak Akses
            </label>

            <select
                name="role"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="peminjam" {{ old('role', $user->role) == 'peminjam' ? 'selected' : '' }}>
                    Peminjam
                </option>

                <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                    Petugas
                </option>

                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>
            </select>
        </div>

        <!-- No HP -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2">
                No. HP
            </label>

            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp', $user->no_hp) }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Foto Profil -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2">
                Foto Profil
            </label>

            <!-- Foto Saat Ini -->
            @if($user->foto_profile)

                @php
                    if (str_starts_with($user->foto_profile, 'profile/')) {
                        $fotoSaatIni = asset($user->foto_profile);
                    } else {
                        $fotoSaatIni = asset('storage/' . $user->foto_profile);
                    }
                @endphp

                <div class="mb-3 flex items-center gap-3">

                    <img
                        src="{{ $fotoSaatIni }}"
                        alt="Foto {{ $user->name }}"
                        class="w-20 h-20 rounded-full object-cover border-2 border-gray-200 shadow-sm"
                    >

                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Foto saat ini
                        </p>

                        <p class="text-xs text-gray-500">
                            Pilih foto baru jika ingin menggantinya.
                        </p>
                    </div>

                </div>

            @else

                <div class="mb-3 flex items-center gap-3">
                    <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center border-2 border-gray-200">
                        <span class="text-2xl font-bold text-blue-600">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>

                    <p class="text-sm text-gray-500">
                        Pengguna belum memiliki foto profil.
                    </p>
                </div>

            @endif

            <!-- Upload Foto Baru -->
            <input
                type="file"
                name="foto_profile"
                accept="image/jpeg,image/png,image/jpg,image/webp"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-blue-500
                       text-sm bg-white"
            >

            <p class="text-xs text-gray-500 mt-1">
                Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
            </p>

            @error('foto_profile')
                <span class="text-red-500 text-xs">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-2">

            <a
                href="{{ route('admin.user.index') }}"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg text-sm font-semibold transition"
            >
                Batal
            </a>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition"
            >
                Perbarui
            </button>
        </div>
    </form>
</div>

@endsection