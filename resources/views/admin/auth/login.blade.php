<x-admin-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="bg-cover bg-center bg-opacity-10 min-h-screen"
        style="background-image:url('{{ login_page_bg_url() ? login_page_bg_url() : asset('admin/src/assets/images/bg.jpg') }}')">

        <div class="flex justify-center items-center h-screen md:p-0 p-4">
            <div class="bg-white bg-opacity-40 md:px-10 p-4 md:py-8 rounded-lg glass">
                <div class="md:text-3xl text-xl font-bold md:mb-4 mb-2 text-center">
                    Login
                </div>

                <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-input w-full rounded-md bg-gray-200 p-2" type="email"
                            name="email" :value="old('email')" autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-input w-full rounded-md bg-gray-200 p-2"
                            type="password" name="password" autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="text-center">
                        <x-primary-button>
                            {{ __('Login') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-guest-layout>
