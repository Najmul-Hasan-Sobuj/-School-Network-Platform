<x-admin-app-layout>
    <div class="p-4">

        {{-- <div class="grid place-items-center my-10">
            <div
                class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
                <div class="grid grid-cols-3 gap-4">
                    <div class="">Settings</div>
                    <div></div>
                    <div></div>
                    <a href="{{ route('admin.download.backup') }}" class="btn btn-primary">Download Backup</a>
                    <form method="POST" action="{{ route('admin.backup.run') }}">
                        @csrf
                        <button type="submit">Run Backup</button>
                    </form>

                    <form method="POST" action="{{ route('admin.optimize.clear') }}">
                        @csrf
                        <button type="submit">Clear Optimize Cache</button>
                    </form>

                    <form method="POST" action="{{ route('admin.passport.install') }}">
                        @csrf
                        <button type="submit">Install Passport</button>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="grid place-items-center">
            @can('setting.update')
                <div
                    class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
                    <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- WhatsApp Chat URL -->
                        <div>
                            <x-input-label for="whatsapp_chat_url" :value="__('WhatsApp Chat URL')" />
                            <x-text-input id="whatsapp_chat_url" class="block mt-1 w-full" type="text"
                                name="whatsapp_chat_url" :value="optional($settings)->whatsapp_chat_url" />
                            <x-input-error :messages="$errors->get('whatsapp_chat_url')" class="mt-2" />
                        </div>

                        <!-- Facebook URL -->
                        <div>
                            <x-input-label for="facebook_url" :value="__('Facebook URL')" />
                            <x-text-input id="facebook_url" class="block mt-1 w-full" type="text" name="facebook_url"
                                :value="optional($settings)->facebook_url" />
                            <x-input-error :messages="$errors->get('facebook_url')" class="mt-2" />
                        </div>

                        <!-- Youtube URL -->
                        <div>
                            <x-input-label for="youtube_url" :value="__('Youtube URL')" />
                            <x-text-input id="youtube_url" class="block mt-1 w-full" type="text" name="youtube_url"
                                :value="optional($settings)->youtube_url" />
                            <x-input-error :messages="$errors->get('youtube_url')" class="mt-2" />
                        </div>

                        <!-- Gmail URL -->
                        <div>
                            <x-input-label for="gmail_url" :value="__('Gmail URL')" />
                            <x-text-input id="gmail_url" class="block mt-1 w-full" type="text" name="gmail_url"
                                :value="optional($settings)->gmail_url" />
                            <x-input-error :messages="$errors->get('gmail_url')" class="mt-2" />
                        </div>

                        <!-- Google Analytics Code -->
                        {{-- <div>
                        <x-input-label for="google_analytics_code" :value="__('Google Analytics Code')" />
                        <textarea id="google_analytics_code"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="google_analytics_code" rows="4">{{ optional($settings)->google_analytics_code }}</textarea>
                        <x-input-error :messages="$errors->get('google_analytics_code')" class="mt-2" />
                    </div> --}}

                        <!-- Google map url -->
                        <div>
                            <x-input-label for="google_map_url" :value="__('Google map URL')" />
                            <x-text-input id="google_map_url" class="block mt-1 w-full" type="url" name="google_map_url"
                                :value="optional($settings)->google_map_url" />
                            <x-input-error :messages="$errors->get('google_map_url')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="optional($settings)->address" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="optional($settings)->phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="optional($settings)->email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Site Logo -->
                        <div>
                            <x-input-label for="site_logo" :value="__('Site Logo')" />
                            <x-text-input id="site_logo" class="block mt-1 w-full" type="file" accept="image/*"
                                name="site_logo" onchange="previewImages(event, 'site_logo_preview')" />
                            <x-input-error :messages="$errors->get('site_logo')" class="mt-2" />

                            <div class="w-20 h-20 mt-2">
                                <img src="{{ optional($settings)->site_logo ? asset('storage/' . optional($settings)->site_logo) : asset('admin/src/assets/images/pre.png') }}"
                                    class="object-cover object-center rounded w-full h-full" id="site_logo_preview">
                            </div>
                        </div>

                        <!-- login page bg image -->
                        <div>
                            <x-input-label for="login_page_bg_image" :value="__('login background image')" />
                            <x-text-input id="login_page_bg_image" class="block mt-1 w-full" type="file" accept="image/*"
                                name="login_page_bg_image" onchange="previewImages(event, 'login_page_bg_image_preview')" />
                            <x-input-error :messages="$errors->get('login_page_bg_image')" class="mt-2" />

                            <div class="w-20 h-20 mt-2">
                                <img src="{{ optional($settings)->login_page_bg_image ? asset('storage/' . optional($settings)->login_page_bg_image) : asset('admin/src/assets/images/pre.png') }}"
                                    class="object-cover object-center rounded w-full h-full"
                                    id="login_page_bg_image_preview">
                            </div>
                        </div>


                        <!-- Site Name -->
                        <div>
                            <x-input-label for="site_name" :value="__('Site Name')" />
                            <x-text-input id="site_name" class="block mt-1 w-full" type="text" name="site_name"
                                :value="optional($settings)->site_name" />
                            <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                        </div>

                        <!-- Meta Title -->
                        <div>
                            <x-input-label for="meta_title" :value="__('Meta Title')" />
                            <x-text-input id="meta_title" class="block mt-1 w-full" type="text" name="meta_title"
                                :value="optional($settings)->meta_title" />
                            <x-input-error :messages="$errors->get('meta_title')" class="mt-2" />
                        </div>

                        <!-- Meta Image -->
                        <div>
                            <x-input-label for="meta_image" :value="__('Meta Image')" />
                            <x-text-input id="meta_image" class="block mt-1 w-full" type="file" accept="image/*"
                                name="meta_image" onchange="previewImages(event, 'meta_image_preview')" />
                            <x-input-error :messages="$errors->get('meta_image')" class="mt-2" />

                            <div class="w-20 h-20 mt-2">
                                <img src="{{ optional($settings)->meta_image ? asset('storage/' . optional($settings)->meta_image) : asset('admin/src/assets/images/pre.png') }}"
                                    class="object-cover object-center rounded w-full h-full" id="meta_image_preview">
                            </div>
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <x-input-label for="meta_description" :value="__('Meta Description')" />
                            <x-text-input id="meta_description" class="block mt-1 w-full" type="text"
                                name="meta_description" :value="optional($settings)->meta_description" />
                            <x-input-error :messages="$errors->get('meta_description')" class="mt-2" />
                        </div>

                        <!-- Meta Keywords -->
                        <div>
                            <x-input-label for="meta_keywords" :value="__('Meta Keywords')" />
                            <x-text-input id="meta_keywords" class="block mt-1 w-full" type="text"
                                name="meta_keywords" :value="optional($settings)->meta_keywords" />
                            <x-input-error :messages="$errors->get('meta_keywords')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            @endcan

            @can('password.update')
                <div
                    class="w-full max-w-screen-lg p-4 mt-5 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('admin.password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="current_password" :value="__('Current Password')" />
                            <x-text-input id="current_password" name="current_password" type="password"
                                class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('New Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 block w-full" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            @endcan

            @can('email.update')
                <div
                    class="w-full max-w-screen-lg p-4 mt-5 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Email Settings') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Update your email configuration for sending emails.') }}
                        </p>
                        @can('email.sendTest')
                            <div class="flex items-center gap-4">
                                <form method="post" action="{{ route('admin.email.sendTest') }}">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Send Test Email
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </header>

                    <form method="post" action="{{ route('admin.email.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="driver" :value="__('Driver')" />
                            <x-text-input id="driver" name="driver" type="text" class="mt-1 block w-full"
                                :value="old('driver', optional($emailSettings)->driver ?? '')" />
                            <x-input-error :messages="$errors->updateEmail->get('driver')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="host" :value="__('Host')" />
                            <x-text-input id="host" name="host" type="text" class="mt-1 block w-full"
                                :value="old('host', $emailSettings->host ?? '')" />
                            <x-input-error :messages="$errors->updateEmail->get('host')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="port" :value="__('Port')" />
                            <x-text-input id="port" name="port" type="text" class="mt-1 block w-full"
                                :value="old('port', $emailSettings->port ?? '')" />
                            <x-input-error :messages="$errors->updateEmail->get('port')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                                :value="old('username', $emailSettings->username ?? '')" />
                            <x-input-error :messages="$errors->updateEmail->get('username')" class="mt-2" />
                        </div>

                        <div class="relative">
                            <div class="absolute top-3/4 right-3 h-5 w-5 -translate-y-1/2 place-items-center">
                                <button type="button" id="togglePassword" class=" flex items-center text-xl">
                                    <div class="btn2 text-prime">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1rem" viewBox="0 0 576 512">
                                            <path fill="#808080"
                                                d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                        </svg>
                                    </div>
                                    <div class="btn2 hidden text-prime">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1rem" viewBox="0 0 640 512">
                                            <path fill="#808080"
                                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm51.3 163.3l-41.9-33C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5zm-88-69.3L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8z" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                            <x-input-label for="emailConfigPassword" :value="__('Password')" />
                            <x-text-input id="emailConfigPassword" name="password" type="password"
                                class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->updateEmail->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="encryption" :value="__('Encryption')" />
                            <select id="encryption" name="encryption"
                                class="form-input w-full text-gray-800 rounded-md bg-gray-50 border border-gray-300 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 p-2 transition duration-200 ease-in-out shadow-sm hover:border-blue-400">
                                <option value="tls" @if (old('encryption', $emailSettings->encryption ?? '') === 'tls') selected @endif>TLS</option>
                                <option value="ssl" @if (old('encryption', $emailSettings->encryption ?? '') === 'ssl') selected @endif>SSL</option>
                                <option value="" @if (old('encryption', $emailSettings->encryption ?? '') === '') selected @endif>
                                    {{ __('None') }}</option>
                            </select>
                            <x-input-error :messages="$errors->updateEmail->get('encryption')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="from_address" :value="__('From Address')" />
                            <x-text-input id="from_address" name="from_address" type="email" class="mt-1 block w-full"
                                :value="old('from_address', $emailSettings->from_address ?? '')" />
                            <x-input-error :messages="$errors->updateEmail->get('from_address')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="from_name" :value="__('From Name')" />
                            <x-text-input id="from_name" name="from_name" type="text" class="mt-1 block w-full"
                                :value="old('from_name', $emailSettings->from_name ?? '')" />
                            <x-input-error :messages="$errors->updateEmail->get('from_name')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            @endcan
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#togglePassword').click(function() {
                    $('.btn2').toggle('hidden')
                    const passwordInput = $('#emailConfigPassword');
                    const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                    passwordInput.attr('type', type);
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const siteNameInput = document.getElementById('site_name');
                const metaTitleInput = document.getElementById('meta_title');
                siteNameInput.addEventListener('keyup', function() {
                    metaTitleInput.value = siteNameInput.value;
                });
            });
        </script>
    @endpush
</x-admin-app-layout>
