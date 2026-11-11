<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Peminjaman Alat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Login Sistem
        </h3>

        {{-- Pesan sukses registrasi --}}
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert error session --}}
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Alert error validasi --}}
     @if ($errors->any())
    <div class="text-red-500 text-sm mb-3">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-200"
            >
                Masuk
            </button>
        </form>

        <div class="mt-6 pt-5 border-t border-gray-200 text-center">
            <p class="text-sm text-gray-600">
                Belum memiliki akun?
            </p>

            <a
                href="{{ route('register') }}"
                class="inline-block mt-2 text-blue-600 font-semibold hover:text-blue-800 hover:underline"
            >
                Daftar sebagai Peminjam
            </a>
        </div>
    </div>

</body>
</html>
