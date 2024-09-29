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


            @canany(['school.index', 'school.create', 'school.show', 'school.edit', 'school.update', 'school.delete'])
                <a href="{{ route('admin.school.index') }}">
                    <li
                        class="flex space-x-2 items-center navItem {{ request()->routeIs('admin.school.*') ? 'activeSidebar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff"
                                d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z" />
                        </svg>
                        <span class="nav_text">
                            Schools </span>
                    </li>
                </a>
            @endcanany
            @canany(['student.index', 'student.create', 'student.show', 'student.edit', 'student.update',
                'student.delete'])
                <a href="{{ route('admin.personal.index') }}">
                    <li
                        class="flex space-x-2 items-center navItem {{ request()->routeIs('admin.personal.*') ? 'activeSidebar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff"
                                d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z" />
                        </svg>
                        <span class="nav_text">
                            Students </span>
                    </li>
                </a>
            @endcanany
            @canany(['project.index', 'project.create', 'project.show', 'project.edit', 'project.update',
                'project.delete'])
                <a href="{{ route('admin.project.index') }}">
                    <li
                        class="flex space-x-2 items-center navItem {{ request()->routeIs('admin.project.*') ? 'activeSidebar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff"
                                d="M0 80C0 53.5 21.5 32 48 32l96 0c26.5 0 48 21.5 48 48l0 16 192 0 0-16c0-26.5 21.5-48 48-48l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48l0-16-192 0 0 16c0 1.7-.1 3.4-.3 5L272 288l96 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-96 0c-26.5 0-48-21.5-48-48l0-96c0-1.7 .1-3.4 .3-5L144 224l-96 0c-26.5 0-48-21.5-48-48L0 80z" />
                        </svg>
                        <span class="nav_text">
                            Projects </span>
                    </li>
                </a>
            @endcanany
            @canany(['reading.index', 'reading.create', 'reading.show', 'reading.edit', 'reading.update',
                'reading.delete'])
                <a href="{{ route('admin.reading.index') }}">
                    <li
                        class="flex space-x-2 items-center navItem {{ request()->routeIs('admin.reading.*') ? 'activeSidebar' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="#fff"
                                d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5l0-377.4c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8L0 454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5l0-370.3c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11L304 456c0 11.4 11.7 19.3 22.4 15.5z" />
                        </svg>
                        <span class="nav_text">
                            Readings </span>
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
