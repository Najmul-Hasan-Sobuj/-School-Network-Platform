<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terms and Conditions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 p-6">

                    <!-- Main Content Section -->
                    <div class="lg:col-span-8">
                        <h1 class="text-4xl font-extrabold mb-6 text-gray-900">Terms and Conditions</h1>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            Welcome to our Terms and Conditions page. These terms govern your use of our services.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Introduction</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            By accessing or using our services, you agree to comply with these terms. If you do not agree, you must not use our services.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Use of Our Services</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            You are responsible for your use of our services and for any content you provide. You must not use our services in a way that violates any applicable law or regulation.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Intellectual Property</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            All content, trademarks, and other intellectual property on our site are owned by us or our licensors. You may not use them without our prior written consent.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Limitation of Liability</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            To the fullest extent permitted by law, we shall not be liable for any indirect, incidental, or consequential damages arising out of your use of our services.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Changes to These Terms</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            We may update our Terms and Conditions from time to time. We will notify you of any changes by posting the new terms on this page.
                        </p>

                        <p class="mt-6 text-gray-600">
                            If you have any questions about these Terms and Conditions, please <a href="#" class="text-indigo-600 underline">contact us</a>.
                        </p>
                    </div>

                    <!-- Sidebar or Additional Information -->
                    <div class="lg:col-span-4 space-y-6">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Understanding Your Rights</h3>
                            <p class="text-gray-700 leading-relaxed">
                                It is important to understand your rights and obligations when using our services. Please review these terms carefully.
                            </p>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Need Help?</h3>
                            <p class="text-gray-700 leading-relaxed">
                                If you have questions about these terms or your rights, don't hesitate to <a href="#" class="text-indigo-600 underline">reach out to us</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
