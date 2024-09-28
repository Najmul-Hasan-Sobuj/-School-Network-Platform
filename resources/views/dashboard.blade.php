<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Bento Grid Start -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                <!-- Profile Completion Progress Bar -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Profile Completion</h3>
                    <p class="text-gray-700 mb-4">Complete your profile to unlock all features.</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                    <span class="text-sm text-gray-500">75% completed</span>
                </div>

                <!-- Activity Graph -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Recent Activity Graph</h3>
                    <p class="text-gray-700 mb-4">A quick overview of your activity in the past week.</p>
                    <canvas id="activityChart" width="100" height="100"></canvas>
                </div>

                <!-- Video Categories -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Recommended Videos</h3>
                    <p class="text-gray-700 mb-4">Browse educational videos curated for you.</p>
                    <ul class="list-disc list-inside text-blue-500">
                        <li class="hover:underline cursor-pointer">Web Development</li>
                        <li class="hover:underline cursor-pointer">Data Science</li>
                        <li class="hover:underline cursor-pointer">Graphic Design</li>
                    </ul>
                </div>

                <!-- Notifications -->
                <div class="bg-white p-6 rounded-lg shadow-md relative">
                    <h3 class="text-lg font-semibold mb-2">Notifications</h3>
                    <p class="text-gray-700 mb-4">You have 3 new notifications.</p>
                    <div
                        class="absolute top-4 right-4 bg-red-500 text-white rounded-full h-6 w-6 flex items-center justify-center">
                        3
                    </div>
                    <button class="text-blue-500 hover:underline">View All</button>
                </div>

                <!-- Task Progress -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Task Progress</h3>
                    <p class="text-gray-700 mb-4">Track your progress on ongoing tasks.</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 50%"></div>
                    </div>
                    <span class="text-sm text-gray-500">50% of tasks completed</span>
                </div>

                <!-- Daily Goal Widget -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Daily Goal</h3>
                    <p class="text-gray-700 mb-4">Complete 5 tasks today!</p>
                    <div class="text-center">
                        <svg class="mx-auto w-16 h-16 text-blue-500" viewBox="0 0 36 36">
                            <path class="text-gray-300"
                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                fill="none" stroke-width="2.8" stroke-dasharray="100, 100" />
                            <path class="text-blue-600"
                                d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                fill="none" stroke-width="2.8" stroke-dasharray="75, 100" />
                        </svg>
                        <p class="text-gray-500 text-sm mt-2">75% of your daily goal</p>
                    </div>
                </div>

                <!-- Trending Courses -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Trending Courses</h3>
                    <p class="text-gray-700 mb-4">Enroll in popular courses today.</p>
                    <div class="flex items-center">
                        <img src="course-image.jpg" alt="Course Image" class="w-12 h-12 rounded mr-4">
                        <div>
                            <h4 class="font-semibold">Advanced Laravel</h4>
                            <p class="text-sm text-gray-600">5k students enrolled</p>
                        </div>
                    </div>
                </div>

                <!-- Support Chat Widget -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Support Chat</h3>
                    <p class="text-gray-700 mb-4">Have questions? Chat with support.</p>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Start Chat</button>
                </div>
            </div>
            <!-- Bento Grid End -->

            <!-- YouTube Video Slider Start -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Latest YouTube Videos</h3>
                <div class="relative w-full h-72 bg-gray-100 overflow-x-auto whitespace-nowrap">
                    <!-- Slider Container -->
                    <div class="flex space-x-6 py-4 px-6">

                        <!-- Video 1 -->
                        <div class="inline-block w-64 bg-white rounded-lg shadow-md">
                            <iframe width="100%" height="160" src="https://www.youtube.com/embed/tqD8EGcAErM"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <div class="p-4">
                                <h4 class="font-semibold text-md">Video Title 1</h4>
                                <p class="text-sm text-gray-500">Video description or upload date.</p>
                            </div>
                        </div>

                        <!-- Video 2 -->
                        <div class="inline-block w-64 bg-white rounded-lg shadow-md">
                            <iframe width="100%" height="160" src="https://www.youtube.com/embed/tqD8EGcAErM"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <div class="p-4">
                                <h4 class="font-semibold text-md">Video Title 2</h4>
                                <p class="text-sm text-gray-500">Video description or upload date.</p>
                            </div>
                        </div>

                        <!-- Video 3 -->
                        <div class="inline-block w-64 bg-white rounded-lg shadow-md">
                            <iframe width="100%" height="160" src="https://www.youtube.com/embed/tqD8EGcAErM"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <div class="p-4">
                                <h4 class="font-semibold text-md">Video Title 3</h4>
                                <p class="text-sm text-gray-500">Video description or upload date.</p>
                            </div>
                        </div>

                        <!-- Add more video slides as needed -->
                    </div>
                </div>
            </div>
            <!-- YouTube Video Slider End -->

        </div>
    </div>

</x-app-layout>

