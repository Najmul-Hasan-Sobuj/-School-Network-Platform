<x-admin-app-layout>
    <!-- Main Content -->
    <div class="lg:text-3xl md:text-2xl text-md font-semibold mb-4 text-gray-500 ml-6 p-4">
        {{ $title ?? config('app.name') }}</div>

    <div class="overflow-y-auto max-w-full p-4">
        <!-- Bento Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Sales Forecast -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Sales Forecast</div>
                <div class="text-2xl font-semibold text-gray-800">Expected: $50,000</div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Total Orders</div>
                <div class="text-2xl font-semibold text-gray-800">567</div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                </div>
            </div>

            <!-- Revenue -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Revenue</div>
                <div class="text-2xl font-semibold text-gray-800">$45,678</div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                </div>
            </div>

            <!-- New Subscribers -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">New Subscribers</div>
                <div class="text-2xl font-semibold text-gray-800">789</div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                </div>
            </div>

            <!-- Performance Chart -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Performance</div>
                <div class="w-full h-32">
                    <!-- Chart Placeholder -->
                    <canvas id="performanceChart"></canvas>
                </div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Recent Activities</div>
                <ul class="mt-2 text-sm">
                    <li class="text-gray-700">• John Doe logged in</li>
                    <li class="text-gray-700">• Payment received for Order #1234</li>
                    <li class="text-gray-700">• User 'jane_doe' updated profile</li>
                </ul>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View details</a>
                </div>
            </div>

            <!-- Notifications -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="flex justify-between">
                    <div class="text-gray-500 text-sm">Notifications</div>
                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                </div>
                <ul class="mt-2 text-sm">
                    <li class="text-gray-700">• New message from Support</li>
                    <li class="text-gray-700">• Server maintenance tomorrow</li>
                    <li class="text-gray-700">• New user registration</li>
                </ul>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View all</a>
                </div>
            </div>

            <!-- Task Progress -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Task Progress</div>
                <div class="text-lg font-semibold text-gray-800">75%</div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
                    <div class="bg-indigo-500 h-2 rounded-full" style="width: 75%"></div>
                </div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View tasks</a>
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Top Products</div>
                <ul class="mt-2 text-sm">
                    <li class="text-gray-700">• Product A - 345 sales</li>
                    <li class="text-gray-700">• Product B - 230 sales</li>
                    <li class="text-gray-700">• Product C - 198 sales</li>
                </ul>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View products</a>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Upcoming Events</div>
                <ul class="mt-2 text-sm">
                    <li class="text-gray-700">• Webinar on Marketing - June 10</li>
                    <li class="text-gray-700">• Team Meeting - June 12</li>
                    <li class="text-gray-700">• Product Launch - June 15</li>
                </ul>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View all</a>
                </div>
            </div>

            <!-- Feedback Overview -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">Customer Feedback</div>
                <div class="text-2xl font-semibold text-gray-800">4.5/5</div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">View feedback</a>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-gray-50 shadow-md rounded-lg p-6 hover:bg-gray-100 transition ease-in-out duration-200">
                <div class="text-gray-500 text-sm">System Status</div>
                <div class="text-lg font-semibold text-gray-800">All Systems Operational</div>
                <div class="mt-2">
                    <a href="#" class="text-indigo-500 hover:text-indigo-700 text-sm">Check status</a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- Example script for charts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Sample chart for Performance
            const ctx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May'],
                    datasets: [{
                        label: 'Sales',
                        data: [120, 150, 180, 220, 300],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</x-admin-app-layout>
