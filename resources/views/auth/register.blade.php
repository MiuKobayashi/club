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
            <label for="year">Year</label>
            <div>
            <select id="year" name="year" class="mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">選択してください</option>
                <option id="year-1" value=1>1年</option>
                <option id="year-2" value=2>2年</option>
                <option id="year-3" value=3>3年</option>
                <option id="year-4" value=4>4年</option>
                <option id="year-5" value=5>M1年</option>
                <option id="year-6" value=6>M2年</option>
            </select>
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>
        </div>
        
        <!-- Experience -->
        <div class="mt-4">
            <label>Experience
                <div style="padding-top: 8px">
                    <input id="experience-t" type="radio" name="experience" value=1>
                    <label for="experience-t">経験者</label>
                    <input id="experience-f" type="radio" name="experience" value=0>
                    <label for="experience-f">初心者</label>
                </div>
                <x-input-error :messages="$errors->get('experience')" class="mt-2" />
            </label>
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
