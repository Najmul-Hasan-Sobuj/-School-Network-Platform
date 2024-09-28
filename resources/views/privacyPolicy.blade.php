<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Privacy Policy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 p-6">

                    <!-- Main Content Section -->
                    <div class="lg:col-span-8">
                        <h1 class="text-4xl font-extrabold mb-6 text-gray-900">Privacy Policy</h1>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            Welcome to our Privacy Policy page. Your privacy is critically important to us.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Information We Collect</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            We collect various types of information in connection with the services we provide, including personal information, usage data, and cookies.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">How We Use Information</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            We use the information we collect for various purposes, including providing services, improving our website, and communicating with you.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Sharing of Information</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            We do not share your personal information with third parties except as outlined in this policy. We may share information with service providers who assist us in our operations.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Your Rights</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            You have the right to access, update, or delete the personal information we have on file for you. You can exercise these rights by contacting us directly.
                        </p>

                        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Changes to This Policy</h2>
                        <p class="mb-4 text-gray-700 leading-relaxed">
                            We may update our Privacy Policy from time to time. Any changes will be posted on this page, and we encourage you to review it periodically.
                        </p>

                        <p class="mt-6 text-gray-600">
                            If you have any questions about this Privacy Policy, please <a href="#" class="text-indigo-600 underline">contact us</a>.
                        </p>
                    </div>

                    <!-- Sidebar or Additional Information -->
                    <div class="lg:col-span-4 space-y-6">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Why We Value Your Privacy</h3>
                            <p class="text-gray-700 leading-relaxed">
                                Privacy is essential in our digital world. We are committed to protecting your personal data and ensuring its confidentiality.
                            </p>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Need More Info?</h3>
                            <p class="text-gray-700 leading-relaxed">
                                Learn more about how we handle your data by exploring our <a href="#" class="text-indigo-600 underline">FAQ section</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
