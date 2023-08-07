<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Year -->
        <div class="mt-4">
            <x-input-label for="year" :value="__('Year')" />
            <x-text-input id="year" class="block mt-1 w-full" type="year" name="year" :value="old('year')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>
        
        <!-- Experience -->
        <div class="mt-4">
            <x-input-label for="experience" :value="__('Experience')" />
            <x-text-input id="experience" class="block mt-1 w-full" type="experience" name="experience" :value="old('experience')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
        </div>
        
        <!-- Admin -->
        <div class="mt-4">
            <x-input-label for="admin" :value="__('Admin')" />
            <x-text-input id="admin" class="block mt-1 w-full" type="admin" name="admin" :value="old('admin')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('admin')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
