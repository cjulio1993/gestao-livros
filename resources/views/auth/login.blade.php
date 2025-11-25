@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-md w-full space-y-8">
    <x-dashboard-card title="Entrar" description="Acesse sua conta para gerenciar o acervo e empréstimos." color="green" icon='<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7"/></svg>' >

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6" novalidate>
                @csrf
                <input type="hidden" name="remember" id="remember_input" value="0">

                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <div class="mt-1 relative rounded-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                {{-- <!-- Email icon -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: rgb(156,163,175);">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                                </svg> --}}
                            </div>
                            <input id="email" name="email" type="email" autocomplete="username" required value="{{ old('email') }}" class="pl-10 appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="seu@exemplo.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
                        <div class="mt-1 relative rounded-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                {{-- <!-- Lock icon -->
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: rgb(156,163,175);">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v5m-3 0h6m-9-3h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2zm3-10V7a3 3 0 116 0v4" />
                                </svg> --}}
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="pl-10 appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Sua senha">
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-gray-500" aria-label="Mostrar senha">
                                <!-- Eye icon (visible) -->
                                <svg id="icon-eye" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                        <span class="ml-2 text-gray-600 dark:text-gray-300">Lembrar-me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 dark:text-gray-300 hover:underline" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                    @endif
                </div>

                <div>
                    <x-button type="submit" color="primary" outlined class="w-full flex justify-center items-center">
                        Entrar
                    </x-button>
                </div>

                <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                    <span>Não tem conta?</span>
                    <a href="route('register')" class="ml-1 text-indigo-600 dark:text-indigo-400 hover:underline">Crie uma</a>
                </div>
            </form>

        </x-dashboard-card>
    </div>
</div>

@push('scripts')
<script>
    // Toggle mostrar/ocultar senha
    (function(){
        const toggle = document.getElementById('toggle-password');
        const pass = document.getElementById('password');
        const eyeSVG = `
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>`;

        const eyeOffSVG = `
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.223-3.431M3 3l18 18" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.584 10.587A3 3 0 0113.413 13.416" />
            </svg>`;

        toggle?.addEventListener('click', () => {
            if (pass.type === 'password') {
                pass.type = 'text';
                toggle.innerHTML = eyeOffSVG;
                toggle.setAttribute('aria-label', 'Ocultar senha');
            } else {
                pass.type = 'password';
                toggle.innerHTML = eyeSVG;
                toggle.setAttribute('aria-label', 'Mostrar senha');
            }
        });

        // Sync remember checkbox to hidden input (so backend reads it)
        const rememberCheckbox = document.getElementById('remember_me');
        const rememberInput = document.getElementById('remember_input');
        rememberCheckbox?.addEventListener('change', () => {
            rememberInput.value = rememberCheckbox.checked ? '1' : '0';
        });

        // Basic client-side enable/disable submit (optional)
        const form = document.querySelector('form');
        const submit = form?.querySelector('button[type="submit"]');
        const email = document.getElementById('email');
        function validate() {
            if (!email || !pass || !submit) return;
            submit.disabled = !(email.value.trim() && pass.value.trim());
        }
        [email, pass].forEach(el => el?.addEventListener('input', validate));
        validate();
    })();
</script>
@endpush

@endsection
