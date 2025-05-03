<x-guest-layout>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="rounded-5 p-6" style="width:600px; top: 0%; left:50%; transform:translate(100%,30%); background:#255483;">
        <div class="text-center font-bold p-6" style="font-size: 2rem;color:white">
            Connexion
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Nom d\'utilisateur')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('Email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de Passe')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-start mt-4">
                <button class="btn rounded-pill font-semibold  dark:hover:text-white focus:outline focus:outline-2 focus:outline-white" style="background:white;color:#255483;font-size:2rem">
                    Valider
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
