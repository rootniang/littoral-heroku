<x-guest-layout>


    <div class="screen-1" >
        <svg class="logo" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1"
            width="300" height="300" viewbox="0 0 640 480" xml:space="preserve">
            <g transform="matrix(3.31 0 0 3.31 320.4 240.4)" >
                <circle
                    style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; 
                             stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; 
                             fill: rgb(51 ,0, 102); fill-rule: nonzero; opacity: 1;"
                    cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
                <circle
                    style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                    cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
                <circle
                    style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                    cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
                <circle
                    style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                    cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
                <polygon
                    style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                    points="-50,-50 -50,50 50,50 50,-50 "></polygon>
            </g>
            <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
                <polygon
                    style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                    vector-effect="non-scaling-stroke" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
            </g>
        </svg>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form class="screen-2" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
            @csrf
            <div class="email">
                <label for="login">Nom d'utilisateur</label>
                <div class="sec-2">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" />
                </div>
            </div>
            <div class="password">
                <label for="password">Mot de Passe</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="pas" type="password" name="password" placeholder="············" />
                    <ion-icon class="show-hide" name="eye-outline"></ion-icon>
                </div>
            </div>
            <button type="submit" class="login" style="background-color: rgb(51 ,0, 102);">Se Connecter</button>
        </form>
    </div>














    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card> --}}
</x-guest-layout>
