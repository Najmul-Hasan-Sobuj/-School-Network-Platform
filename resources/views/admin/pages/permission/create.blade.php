<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4">
                <div class="">Permission Create</div>
                <div></div>
                <div class=" justify-self-end">
                    <a href="{{ route('admin.permission.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center mt-5">
        <div class="max-w-lg mx-auto">
            <form method="POST" action="{{ route('admin.permission.store') }}"
                class="bg-white shadow-xl border rounded px-8 pt-6 pb-8 mb-4 grid gap-4 min-w-lg">
                @csrf
                <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                    <div>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" name="name" type="text" placeholder="name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <button
                        class="btn bg-[#5d77ed] text-white w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        যোগ করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>
