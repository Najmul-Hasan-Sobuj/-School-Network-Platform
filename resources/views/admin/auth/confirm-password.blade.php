<x-admin-guest-layout>
    <div class="bg-cover bg-center bg-opacity-10 min-h-screen"
        style="background-image:url('{{ asset('admin/src/assets/images/bg.jpg') }}')">
        <div class="flex justify-center items-center h-screen md:p-0 p-4">
            <div class="bg-white bg-opacity-40 md:px-10 p-4 md:py-8 rounded-lg glass">
                <div class="md:text-3xl text-xl font-bold md:mb-4 mb-2 text-center">
                    Confirm Password
                </div>
                <form method="POST" action="{{ route('admin.password.confirm') }}" class="space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="password" :value="__('পাসওয়ার্ড')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            autocomplete="current-password" />

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
