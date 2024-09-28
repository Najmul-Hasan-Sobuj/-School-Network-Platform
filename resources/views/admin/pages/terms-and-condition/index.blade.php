<x-admin-app-layout>
    <div class="grid place-items-center my-10">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4">
                <div class="">Create Or Edit Terms And Condition</div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="grid place-items-center">
        <div
            class="w-full max-w-screen-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8  dark:border-gray-700">
            <form method="POST" action="{{ route('admin.terms-and-condition.update') }}">
                @csrf
                @method('PUT')

                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description"
                        class="ckeditor block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="description" rows="4" required> {!! optional($termsAndConditions)->description !!}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
    <script>
        CKEDITOR.replace('description', {
            extraPlugins: 'codesnippet',
            codeSnippet_theme: 'default'
        });
    </script>
</x-admin-app-layout>
