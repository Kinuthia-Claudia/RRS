<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="display: flex; justify-content: center; align-items: center; height: 100px; background-color: #f0f0f0; border-bottom: 1px solid #ccc;">
        <h1 style="font-size: 2rem; color: #333; text-align: center;">Analytics</h1>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-3 gap-4">
                <!-- First Row -->
                <div class="flex">
                    <!-- Total Users Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center space-x-4">
                            <span class="text-4xl text-gray-500">
                                <i class="far fa-user"></i>
                            </span>
                            <div>
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Total Users
                                </h6>
                                  <span class="text-xl font-semibold">{{ $totalUsers }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Total Reservations Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md ml-4">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <span class="text-4xl text-gray-500">
                                <i class="fa-solid fa-book"></i>
                            </span>
                            <div>
                                <!-- Statistic Title -->
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Total Reservations
                                </h6>
                                <!-- Statistic Value -->
                                <span class="text-xl font-semibold">{{ $totalReservations }}</span> <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>

                    <!-- Total Reviews Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md ml-4">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <span class="text-4xl text-gray-500">
                                <i class="fa-solid fa-list-ol"></i>
                            </span>
                            <div>
                                <!-- Statistic Title -->
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Total Reviews
                                </h6>
                                <!-- Statistic Value -->
                                <span class="text-xl font-semibold">{{ $totalReviews }}</span> <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="flex mt-4">
                    <!-- Average Rating Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <span class="text-4xl text-gray-500">
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <div>
                                <!-- Statistic Title -->
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Average Rating
                                </h6>
                                <!-- Statistic Value -->
                                <span class="text-xl font-semibold">{{ number_format($averageRating, 1) }}</span> <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>

                    <!-- Reservations Today Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md ml-4">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <span class="text-4xl text-gray-500">
                                <i class="fa-solid fa-calendar-day"></i>
                            </span>
                            <div>
                                <!-- Statistic Title -->
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Reservations Today
                                </h6>
                                <!-- Statistic Value -->
                                <span class="text-xl font-semibold">{{ $reservationsToday }}</span> <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>

                    <!-- Reservations This Week Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md ml-4">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <span class="text-4xl text-gray-500">
                                <i class="fa-solid fa-calendar-week"></i>
                            </span>
                            <div>
                                <!-- Statistic Title -->
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Reservations This Week
                                </h6>
                                <!-- Statistic Value -->
                                <span class="text-xl font-semibold">{{ $reservationsThisWeek }}</span> <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Row -->
                <div class="flex mt-4">
                    <!-- Reservations This Month Card -->
                    <div class="flex-1 items-center justify-between p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center space-x-4">
                            <!-- Icon -->
                            <span class="text-4xl text-gray-500">
                                <i class="fa-solid fa-calendar-days"></i>
                            </span>
                            <div>
                                <!-- Statistic Title -->
                                <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                                    Reservations This Month
                                </h6>
                                <!-- Statistic Value -->
                                <span class="text-xl font-semibold">{{ $reservationsThisMonth }}</span> <!-- Replace with dynamic value -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <!-- Bar Chart Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex-grow bg-white rounded-xl shadow-md px-6 py-4 flex flex-col items-end">
                    <div class="text-xs font-semibold tracking-wide uppercase py-1 px-3 rounded-full"
                        style="background-color: rgb(123, 255, 253); color: rgb(0, 119, 117);">Reservations</div>
                    <div class="grid grid-cols-7 gap-1 flex-grow self-stretch">
                        <canvas id="myBarChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex-grow bg-white rounded-xl shadow-md px-6 py-4 flex flex-col items-end">
                    <div class="text-xs font-semibold tracking-wide uppercase py-1 px-3 rounded-full"
                        style="background-color: rgb(123, 255, 253); color: rgb(0, 119, 117);">Guests</div>
                    <div class="grid grid-cols-7 gap-1 flex-grow self-stretch">
                        <canvas id="myPieChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hourly Distribution Chart Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex-grow bg-white rounded-xl shadow-md px-6 py-4 flex flex-col items-end">
                    <div class="text-xs font-semibold tracking-wide uppercase py-1 px-3 rounded-full"
                        style="background-color: rgb(123, 255, 253); color: rgb(0, 119, 117);">Hourly Distribution</div>
                    <div class="grid grid-cols-7 gap-1 flex-grow self-stretch">
                        <canvas id="myHourlyChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Peak Times Chart Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex-grow bg-white rounded-xl shadow-md px-6 py-4 flex flex-col items-end">
                    <div class="text-xs font-semibold tracking-wide uppercase py-1 px-3 rounded-full"
                        style="background-color: rgb(123, 255, 253); color: rgb(0, 119, 117);">Daily Peak Times</div>
                    <div class="grid grid-cols-7 gap-1 flex-grow self-stretch">
                        <canvas id="myDailyPeakChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

<!-- JavaScript to render Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart
    var ctxBar = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Number of Reservations',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Pie Chart
    var ctxPie = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: {!! json_encode($guestLabels) !!},
            datasets: [{
                label: 'Number of Guests per Reservation',
                data: {!! json_encode($guestCounts) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Hourly Distribution Chart
    var ctxHourly = document.getElementById('myHourlyChart').getContext('2d');
    var myHourlyChart = new Chart(ctxHourly, {
        type: 'bar',
        data: {
            labels: {!! json_encode($hourlyLabels) !!},
            datasets: [{
                label: 'Number of Reservations',
                data: {!! json_encode($hourlyCounts) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Daily Peak Times Chart
                              var ctxDailyPeak = document.getElementById('myDailyPeakChart').getContext('2d');
                             var myDailyPeakChart = new Chart(ctxDailyPeak, {
                             type: 'line',
                             data: {
                               labels: {!! json_encode($dailyPeakLabels->toArray()) !!},
                                datasets: {!! json_encode($dailyPeakDatasets) !!}
                                 },
                               options: {
                                 responsive: true,
                                plugins: {
                                legend: {
                                    position: 'top',
                },
                                   tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ' ' + tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>


 <!-- Rating Break -->
  <!-- time Break -->

        </div>
    </div>
</x-admin-layout>













