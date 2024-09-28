<!-- Sidebar for Tablet and PC -->
<div class="h-screen  p-4 ">
    <button class="bg-gray-200 text-white p-2 px-2.5 absolute top-0 -right-4 rounded-full toggle-sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" height="1rem" viewBox="0 0 320 512">
            <path fill="#3C8200"
                d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />

        </svg>
    </button>
    <div class="h-full relative">
        <ul class="text-white text-sm lg:text-md flex flex-col space-y-2 my-4 nav nav1">
            @if (auth()->user()->can('dashboard.view'))
                <a href="{{ route('admin.dashboard') }}">
                    <li
                        class="flex space-x-2 items-center navItem {{ request()->routeIs('admin.dashboard') ? 'activeSidebar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff"
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>
                        <span class="nav_text">
                            Dashboard </span>
                    </li>
                </a>
            @endif

            @if (auth()->user()->canAny([
                        'admin.index',
                        'admin.create',
                        'admin.edit',
                        'admin.update',
                        'admin.delete',
                        'role.index',
                        'role.create',
                        'role.edit',
                        'role.update',
                        'role.delete',
                    ]))
                <li class="menu navItem">
                    <div class="flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="#fff"
                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>

                        <span class="nav_text">
                            <a href="#" class="flex space-x-2 items-center">
                                <span>Authorization</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="#fff"
                                        d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                    </div>
                    <ul class="submenu hidden overflow-y-auto max-h-[15rem]"
                        style="{{ request()->routeIs('admin.role.index') || request()->routeIs('admin.user.index') ? 'display: block;' : 'display: none;' }}">
                        @canany(['role.index', 'role.create', 'role.edit', 'role.update', 'role.delete'])
                            <li class="nav_text2"><a href="{{ route('admin.role.index') }}">Role</a></li>
                        @endcanany

                        @canany(['admin.index', 'admin.create', 'admin.edit', 'admin.update', 'admin.delete'])
                            <li class="nav_text2"><a href="{{ route('admin.user.index') }}">User</a></li>
                        @endcanany
                    </ul>
                </li>
            @endif


            @canany(['category.index', 'category.create', 'category.show', 'category.edit', 'category.update',
                'category.delete'])
                <a href="{{ route('admin.category.index') }}">
                    <li
                        class="flex space-x-2 items-center navItem {{ request()->routeIs('admin.category.*') ? 'activeSidebar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff"
                                d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z" />
                        </svg>
                        <span class="nav_text">
                            Category </span>
                    </li>
                </a>
            @endcanany

            @if (auth()->user()->canAny(['privacy-policy.view', 'terms-and-condition.view']))
                <li class="menu navItem">
                    <div class="flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="#fff"
                                d="M41 7C31.6-2.3 16.4-2.3 7 7S-2.3 31.6 7 41l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9L41 7zM599 7L527 79c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l72-72c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0zM7 505c9.4 9.4 24.6 9.4 33.9 0l72-72c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0L7 471c-9.4 9.4-9.4 24.6 0 33.9zm592 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-72-72c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l72 72zM320 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zM212.1 336c-2.7 7.5-4.1 15.6-4.1 24c0 13.3 10.7 24 24 24l176 0c13.3 0 24-10.7 24-24c0-8.4-1.4-16.5-4.1-24c-.5-1.4-1-2.7-1.6-4c-9.4-22.3-29.8-38.9-54.3-43c-3.9-.7-7.9-1-12-1l-80 0c-4.1 0-8.1 .3-12 1c-.8 .1-1.7 .3-2.5 .5c-24.9 5.1-45.1 23-53.4 46.5zM175.8 224a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm-26.5 32C119.9 256 96 279.9 96 309.3c0 14.7 11.9 26.7 26.7 26.7l56.1 0c8-34.1 32.8-61.7 65.2-73.6c-7.5-4.1-16.2-6.4-25.3-6.4l-69.3 0zm368 80c14.7 0 26.7-11.9 26.7-26.7c0-29.5-23.9-53.3-53.3-53.3l-69.3 0c-9.2 0-17.8 2.3-25.3 6.4c32.4 11.9 57.2 39.5 65.2 73.6l56.1 0zM464 224a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                        </svg>
                        <span class="nav_text"><a href="#" class="flex space-x-2 items-center"><span>CRM</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="#fff"
                                        d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                    </path>
                                </svg></a></span>
                    </div>
                    <ul class="submenu hidden overflow-y-auto max-h-[15rem]"
                        style="{{ request()->routeIs('admin.privacy-policy.index') || request()->routeIs('admin.terms-and-condition.index') ? 'display: block;' : 'display: none;' }}">
                        @can('privacy-policy.view')
                            <li class="nav_text2"><a href="{{ route('admin.privacy-policy.index') }}">Privacy Policy</a>
                            </li>
                        @endcan
                        @can('terms-and-condition.view')
                            <li class="nav_text2"><a href="{{ route('admin.terms-and-condition.index') }}">Terms and
                                    Condition</a></li>
                        @endcan
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
