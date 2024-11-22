<?php view('partials/head.view.php'); ?>

<body class="flex font-satoshimed bg-beige">

    <?php view('partials/admin-nav.view.php'); ?>

    <!-- Main content wrapper -->
    <div class="flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <div class="p-12">
            <!-- Your existing content here -->
            <!-- greeting -->
            <h1 class="text-4xl">Welcome back,</h1>
            <div class="flex">
                <h1 class="text-4xl">Admin</h1><h1 class="ml-2 text-4xl" id="name"><?//= $_SESSION['user']['f_name'] ?></h1>
            </div>
        
            <!-- counter -->
            <div class="flex w-full mt-8">

                <a href="/admin-accounts" class="mx-auto ml-0 border border-black rounded-2xl h-26 w-[24%] bg-orangeaccent p-4">
                    <h1 class="text-lg font-satoshimed text-grey-200">Total no. of</h1>
                    <h1 class="text-lg font-satoshimed text-grey-200">Users:</h1>
                    <h1 class="-mt-8 text-6xl text-right font-clashmed" id="userCount"></h1>
                </a>

                <a href="/admin-accounts" class="mx-auto border border-black rounded-2xl h-26 w-[24%] bg-blue2 p-4">
                    <h1 class="text-lg font-satoshimed text-grey-200">Total no. of</h1>
                    <h1 class="text-lg font-satoshimed text-grey-200">Students:</h1>
                    <h1 class="-mt-8 text-6xl text-right font-clashmed" id="studCount"></h1>
                </a>

                <a href="/admin-accounts" class="mx-auto border border-black rounded-2xl h-26 w-[24%] bg-blue2 p-4">
                    <h1 class="text-lg font-satoshimed text-grey-200">Total no. of</h1>
                    <h1 class="text-lg font-satoshimed text-grey-200">Instructors:</h1>
                    <h1 class="-mt-8 text-6xl text-right font-clashmed" id="insCount"></h1>
                </a>

                <a href="/admin-rooms" class="mx-auto mr-0 border border-black rounded-2xl h-26 w-[24%] bg-beige p-4">
                    <h1 class="text-lg font-satoshimed text-grey-200">Total no. of</h1>
                    <h1 class="text-lg font-satoshimed text-grey-200">Rooms:</h1>
                    <h1 class="-mt-8 text-6xl text-right font-clashmed" id="roomCount"></h1>
                </a>
        
            </div>

            <div class="flex w-full mt-8 space-x-4">
                <!-- Monthly Users Chart -->
                <div class="w-4/6 p-4 bg-white border border-black rounded-lg">
                    <h2 class="mb-4 text-xl font-clashmed text-grey2">Monthly User Registration</h2>
                    <div class="h-[300px] w-full flex justify-center">
                        <canvas class="w-full" id="monthlyUsersChart"></canvas>
                    </div>
                </div>

                <!-- User Distribution Chart -->
                <div class="w-2/6 p-4 bg-white border border-black rounded-lg">
                    <h2 class="mb-4 text-xl font-clashmed text-grey2">User Distribution</h2>
                    <div class="h-[300px] flex justify-center">
                        <canvas class="h-full" id="userDistributionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- lists -->
            <div class="relative flex w-full mt-14">
                <!-- left -->
                <div class="mx-auto ml-0 w-[50%] min-w-[37.5rem]">
                    <h2 class="mb-4 text-xl text-left font-clashmed text-grey2">Recently Created Accounts</h2>
                    <div class="container mx-auto my-6 mr-2 overflow-hidden bg-white border border-black rounded-lg shadow-lg">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">School No.</th>
                                <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Name</th>
                                <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Email</th>
                                <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Type</th>
                                <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Timestamp</th>
                                <th class="px-1 py-3 pl-2 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Activation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                                <tbody id="rcAccs">
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <!-- Right -->
                <div class="mx-auto mr-0 w-[50%] min-w-[37.5rem]">
                    <h2 class="mb-4 text-xl text-left font-clashmed text-grey2">Recently Created Rooms</h2>
                    <div class="container mx-auto my-6 ml-2 overflow-hidden bg-white border border-black rounded-lg shadow-lg">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Room ID</th>
                                <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Room Name</th>
                                <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Instructor</th>
                                <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Instructor ID</th>
                                <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Room Code</th>
                                <th class="px-1 py-3 pl-4 text-xs font-semibold tracking-wider text-left text-center text-white uppercase border-l border-r border-black bg-blue3">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                                <tbody id="rcRooms"> 

                                    <!-- Add more rows as needed -->
                                </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if (hasInternetConnection()): ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php endif; ?>
    
    <script src="assets/js/fetch/fetch.js"></script>
    <script>
        let changeChecker = null;
        const recentAccounts = document.getElementById('rcAccs');
        const recentRooms = document.getElementById('rcRooms');

        const totalUsers = document.getElementById('userCount');
        const totalStudents = document.getElementById('studCount');
        const totalInstructors = document.getElementById('insCount');
        const totalRooms = document.getElementById('roomCount');

        document.addEventListener('DOMContentLoaded', function() {
            fetchLatestData({
                "table1": "rooms",
                "table2": "accounts",
                "order_by_rooms": "created_date",
                "order_by_accounts": "reg_date",
                "direction": "DESC",
                "limit": "5",
                "currentPage": "admin_dashboard",
            }, displayDashboard, 3000);
        });

        function displayDashboard(data) {
            // console.log('raw data: ', data, 'Type of Data: ', typeof(data));

            if (changeChecker == null || JSON.stringify(changeChecker) !== JSON.stringify(data)) {
                changeChecker = data;

                <?php if (hasInternetConnection()): ?>
                    updateCharts(data);
                <?php endif; ?>
                // console.log('CHANGED CHECKER: ' ,changeChecker);
            
                totalUsers.innerHTML = '';
                totalInstructors.innerHTML = '';
                totalStudents.innerHTML = '';
                totalRooms.innerHTML = '';
                
                totalUsers.innerHTML = `${data.total_users}`;
                totalInstructors.innerHTML = `${data.total_instructors}`;
                totalStudents.innerHTML = `${data.total_students}`;
                totalRooms.innerHTML = `${data.total_rooms}`;
                
            
                recentAccounts.innerHTML = '';
                data.accounts.forEach(account => {
                    recentAccounts.innerHTML += `
                        <tr>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${account.school_id}">${account.school_id}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${account.school_id}">${account.l_name} ${account.f_name}</a></td>
                            <td class="px-1 text-center py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black truncate max-w-[8rem]"><a href="/admin-account-edit?id=${account.school_id}">${account.email}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${account.school_id}">${account.account_type}</a></td>
                            <td class="px-1 text-center py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black truncate max-w-[8rem]"><a href="/admin-account-edit?id=${account.school_id}">${account.daysAgo} days, ${account.hoursAgo} hours, ${account.minutesAgo} minutes ago</a></td>
                            
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200">
                                <a href="/admin-account-edit?id=${account.school_id}"> ${account.account_activation_hash ? "Not Yet Activated": "Activated"}</a>
                            </td>
                        </tr>
                    `;
                });

                recentRooms.innerHTML = '';
                data.rooms.forEach(room => {
                    recentRooms.innerHTML += `
                        <tr>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}">${room.room_id}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}">${room.room_name}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}">${room.prof_name}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}">${room.school_id}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}">${room.room_code}</a></td>
                            <td class="px-1 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-room-edit?room_id=${room.room_id}"> ${room.daysAgo} days, ${room.hoursAgo} hours, ${room.minutesAgo} minutes ago</a></td>
                        </tr>
                    `;
                });
            }

        }


    let monthlyUsersChart = null;
    let userDistributionChart = null;

    function initializeCharts() {
        const monthlyCtx = document.getElementById('monthlyUsersChart').getContext('2d');
        const distributionCtx = document.getElementById('userDistributionChart').getContext('2d');

        monthlyUsersChart = new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'New Users',
                    data: [],
                    borderColor: '#2563eb',
                    tension: 0.1
                }]
            },
            options: {
                animation: false,
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        userDistributionChart = new Chart(distributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Students', 'Instructors'],
                datasets: [{
                    data: [],
                    backgroundColor: ['#2563eb', '#f97316']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    }

    function updateCharts(data) {
        if (!monthlyUsersChart || !userDistributionChart) {
            initializeCharts();
        }

        // Update Monthly Users Chart
        if (data.monthly_users) {
            const labels = data.monthly_users.map(item => {
                const date = new Date(item.month + '-01');
                return date.toLocaleDateString('default', { month: 'short', year: 'numeric' });
            });
            const values = data.monthly_users.map(item => item.count);

            monthlyUsersChart.data.labels = labels;
            monthlyUsersChart.data.datasets[0].data = values;
            monthlyUsersChart.update();
        }

        // Update User Distribution Chart
        if (data.user_distribution) {
            const distributionData = {
                students: 0,
                instructors: 0
            };

            data.user_distribution.forEach(item => {
                if (item.account_type === 'student') {
                    distributionData.students = parseInt(item.count);
                } else if (item.account_type === 'instructor') {
                    distributionData.instructors = parseInt(item.count);
                }
            });

            userDistributionChart.data.datasets[0].data = [
                distributionData.students,
                distributionData.instructors
            ];
            userDistributionChart.update();
        }
    }
    </script>

    <!-- Add this script at the bottom of your file -->
    <script>
        // Adjust main content margin when sidebar is toggled
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            const mainContent = document.getElementById('main-content');
            mainContent.classList.toggle('ml-48');
            mainContent.classList.toggle('ml-20');
        });
    </script>

</body>