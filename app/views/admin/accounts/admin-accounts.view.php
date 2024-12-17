<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <!-- Loading Indicator -->
    <div id="loadingIndicator" class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75">
        <div class="flex flex-col items-center">
            <!-- <div class="w-12 h-12 mb-4 border-4 border-t-4 border-blue-500 rounded-full animate-spin"></div>
            <p class="text-xl font-satoshimed text-blue3">Loading...</p> -->
            <div class="w-28 h-28 loader">
                
            </div> 
        </div>
    </div>

    <div class="z-40 relative block w-full h-fit py-12 px-6 min-w-[75rem] mb-16 flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <div class="flex items-center justify-between w-full mb-12">
            <h1 class="text-3xl font-clashbold">Account List</h1>
            
            <!-- Updated Filters Section with Toggle -->
            <div class="flex flex-col gap-4 p-6 bg-white border border-black rounded-lg shadow-md w-[40rem]">
                <!-- Always Visible Row -->
                <div class="flex items-end justify-between gap-4">
                    <!-- Search -->
                    <div class="flex-1">
                        <label class="mb-1 text-sm font-satoshimed text-grey2">Search</label>
                        <div class="relative flex items-center">
                            <input id="searchInput" oninput="handleSearch();" type="text" 
                                   placeholder="Search by ID, name, or email..." 
                                   class="w-full px-3 py-1 pl-8 bg-white border border-black rounded-lg">
                            <span class="absolute left-2 text-grey2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                            <button id="clearSearch" class="absolute hidden w-6 h-6 text-xl transition-colors rounded-full right-2 text-red1 hover:bg-red1 hover:bg-opacity-10" onclick="clearSearch()">×</button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2">
                        <!-- Toggle Filters Button -->
                        <button onclick="toggleFilters()" class="px-4 py-1 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                                Filters
                            </div>
                        </button>

                        <!-- Create New Account Button -->
                        <button onclick="showCreateAccountModal()" class="px-4 py-1 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue2">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Create
                            </div>
                        </button>

                        <!-- Export Button -->
                        <button onclick="exportAccounts()" class="px-4 py-1 text-white transition-colors bg-green-600 rounded-lg hover:bg-green-700">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Export
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Toggleable Filters Section -->
                <div id="advancedFilters" class="hidden transition-all duration-300">
                    <hr class="my-2 border-gray-300">
                    <!-- Date Range Filter -->
                    <div class="flex items-start justify-between gap-6">
                        <div class="flex items-start gap-2">
                            <div class="flex flex-col">
                                <label class="mb-1 text-sm font-satoshimed text-grey2">Date Range</label>
                                <div class="flex items-center gap-2">
                                    <input type="date" id="startDate" class="px-2 py-1 bg-white border border-black rounded-lg w-36" placeholder="Start Date">
                                    <span class="text-grey2">to</span>
                                    <input type="date" id="endDate" class="px-2 py-1 bg-white border border-black rounded-lg w-36" placeholder="End Date">
                                </div>
                            </div>
                            <div class="flex flex-col gap-1 mt-6">
                                <button onclick="applyDateFilter()" class="px-3 py-1 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue2">Apply</button>
                                <button id="clearDateFilter" onclick="clearDateFilter()" class="hidden px-3 py-1 transition-colors rounded-lg text-blackpri bg-red1 hover:bg-opacity-80">Clear</button>
                            </div>
                        </div>

                        <!-- Sort Filter -->
                        <div class="flex flex-col">
                            <label class="mb-1 text-sm font-satoshimed text-grey2">Sort By</label>
                            <div class="flex items-center gap-2">
                                <select id="sortBy" class="w-48 px-3 py-1 bg-white border border-black rounded-lg" onchange="handleSort()">
                                    <option value="">Select...</option>
                                    <option value="date_asc">Date (Oldest First)</option>
                                    <option value="date_desc">Date (Newest First)</option>
                                    <option value="name_asc">Name (A-Z)</option>
                                    <option value="name_desc">Name (Z-A)</option>
                                </select>
                                <button id="clearSort" class="hidden w-8 h-8 text-xl transition-colors rounded-full text-red1 hover:bg-red1 hover:bg-opacity-10" onclick="clearSort()">×</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="hidden" id="searchResultsHead">
            <h2>Search Results for: <span id="searchTerm"></span></h2>
        </div>
        
        <div class="overflow-hidden border-b border-black border-x rounded-xl">
            <div class="flex w-64 text-lg font-satoshimed">
                <button onclick="setActiveTab('allList', this);" class="w-40 px-8 py-2 text-center text-white rounded-t-lg tab-button bg-blue3 hover:bg-blue3 hover:text-white">All</button>
                <button onclick="setActiveTab('studentsList', this);" class="w-40 px-8 py-2 text-center rounded-t-lg tab-button bg-blue2 hover:bg-blue3 hover:text-white">Students</button>
                <button onclick="setActiveTab('instructorsList', this);" class="w-40 px-8 py-2 text-center rounded-t-lg tab-button bg-blue2 hover:bg-blue3 hover:text-white">Instructors</button>
            </div>

            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">Edit</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">School ID</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">Surname</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">First name</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">Email</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">Results</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">Registration Time</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase border-black border-x bg-blue3">Activation</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody class="bg-white" id="allList">
                            <!-- Your PHP loop for rows here -->
                        </tbody>

                        <tbody class="hidden bg-white" id="studentsList">
                            <!-- Your PHP loop for student rows here -->
                        </tbody>

                        <tbody class="hidden bg-white" id="instructorsList">
                            <!-- Your PHP loop for instructor rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- MODALS -->
        <?php if(isset($success)): ?>
        <div id="success" class="fixed top-0 left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism">
            <div class="flex flex-col justify-between h-48 bg-white border rounded-t-lg w-90 border-black1">
                <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                    <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Account created</span>
                    <button class="w-10 h-full rounded bg-red1" onClick="hide('success'); enableScroll();">X</button>
                </div>
            
                <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                    <p class="text-black font-satoshimed">Account <span class="text-green1">successfully</span> created,</p>
                    <p class="mb-3 font-satoshimed"></p>
                    <p class="text-2xl font-satoshimed text-grey2">=)</p>
                </div>
            </div>
        </div>
        <?php elseif(isset($idExists)): ?>
            <div id="idExists" class="fixed top-0 left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism">
                <div class="flex flex-col justify-between h-48 bg-white border rounded-t-lg w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Ticket Sent</span>
                        <button class="w-10 h-full rounded bg-red1" onClick="hide('idExists'); enableScroll();">X</button>
                    </div>
                
                    <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                        <p class="text-black font-satoshimed">ID already exists</p>
                        <p class="mb-3 font-satoshimed">please use another ID.</p>
                        <p class="text-2xl font-satoshimed text-grey2">=(</p>
                    </div>
                </div>
            </div>
        <?php elseif(isset($emailExists)): ?>
            <div id="emailExists" class="fixed top-0 left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism">
                <div class="flex flex-col justify-between h-48 bg-white border rounded-t-lg w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white font-satoshimed">Warning</span>
                        <button class="w-10 h-full rounded bg-red1" onClick="hide('emailExists'); enableScroll();">X</button>
                    </div>
                
                    <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                        <p class="text-black font-satoshimed">Email already exists</p>
                        <p class="mb-3 font-satoshimed">please use another email.</p>
                        <p class="text-2xl font-satoshimed text-grey2">=(</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>


    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/loading.js"></script> 
    <script src="assets/js/fetch/fetch.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const studentsList = document.getElementById('studentsList');
        const instructorsList = document.getElementById('instructorsList');
        const allList = document.getElementById('allList');

        let accountsChecker = null;

        let originalData = {
            all: [],
            students: [],
            instructors: []
        };

        document.addEventListener('DOMContentLoaded', function() {
            startFetching();
        });

        function startFetching() {
            fetchLatestData({
                "table": "accounts",
                "currentPage": "admin_accounts",
            }, displayAccounts, 3000);
        }

        function handleSort() {
            const sortBy = document.getElementById('sortBy').value;
            if (sortBy) {
                clearInterval(intervalID);
                document.getElementById('clearSort').classList.remove('hidden');
            }
            
            const currentList = document.querySelector('tbody:not(.hidden)');
            const rows = Array.from(currentList.getElementsByTagName('tr'));

            rows.sort((a, b) => {
                if (sortBy === 'date_asc' || sortBy === 'date_desc') {
                    const dateA = new Date(a.cells[6].textContent);
                    const dateB = new Date(b.cells[6].textContent);
                    return sortBy === 'date_asc' ? dateA - dateB : dateB - dateA;
                } else if (sortBy === 'name_asc' || sortBy === 'name_desc') {
                    const nameA = a.cells[2].textContent.toLowerCase();
                    const nameB = b.cells[2].textContent.toLowerCase();
                    return sortBy === 'name_asc' 
                        ? nameA.localeCompare(nameB)
                        : nameB.localeCompare(nameA);
                }
                return 0;
            });

            while (currentList.firstChild) {
                currentList.removeChild(currentList.firstChild);
            }
            rows.forEach(row => currentList.appendChild(row));
        }

        function clearSort() {
            document.getElementById('sortBy').value = '';
            document.getElementById('clearSort').classList.add('hidden');
            displayAccounts(originalData);
            startFetching();
        }

        function handleSearch() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const clearSearchBtn = document.getElementById('clearSearch');
    const currentList = document.querySelector('tbody:not(.hidden)');
    const rows = Array.from(currentList.getElementsByTagName('tr'));
    
    if (searchTerm) {
        clearInterval(intervalID);
        clearSearchBtn.classList.remove('hidden');
        
        // Hide all rows first
        rows.forEach(row => {
            const schoolId = row.cells[1].textContent.toLowerCase();
            const lastName = row.cells[2].textContent.toLowerCase();
            const firstName = row.cells[3].textContent.toLowerCase();
            const email = row.cells[4].textContent.toLowerCase();
            
            // Check if any field contains the search term
            if (schoolId.includes(searchTerm) || 
                lastName.includes(searchTerm) || 
                firstName.includes(searchTerm) || 
                email.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
        
        show('searchResultsHead');
        document.getElementById('searchTerm').innerHTML = searchTerm;
    } else {
        clearSearch();
    }
}

function clearSearch() {
    const searchInput = document.getElementById('searchInput');
    const clearSearchBtn = document.getElementById('clearSearch');
    const currentList = document.querySelector('tbody:not(.hidden)');
    const rows = Array.from(currentList.getElementsByTagName('tr'));
    
    searchInput.value = '';
    clearSearchBtn.classList.add('hidden');
    hide('searchResultsHead');
    document.getElementById('searchTerm').innerHTML = '';
    
    // Show all rows
    rows.forEach(row => row.style.display = '');
    
    startFetching();
}


function displayAccounts(data) {
    console.log(data);
    if (accountsChecker === null || JSON.stringify(accountsChecker) !== JSON.stringify(data)) {
        allList.innerHTML = '';
        studentsList.innerHTML = '';
        instructorsList.innerHTML = '';

        data.all.forEach(user => {
            allList.innerHTML += `
                <tr>
                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${user.school_id}" class="px-4 py-2 text-white rounded-sm bg-blue3">EDIT</a></td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${user.school_id}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${user.l_name}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${user.f_name}</td>
                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${user.email}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${user.result == null ? 'N/A': user.result}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${user.reg_date}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ${user.account_activation_hash !== '' ? 'text-green1': 'text-red1'} border-l border-r border-black"> ${user.account_activation_hash == '' ? 'Not Yet Activated': 'Activated'}</td>
                </tr>
            `;
        });

        data.students.forEach(student => {
            studentsList.innerHTML += `
                <tr>
                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${student.school_id}" class="px-4 py-2 text-white rounded-sm bg-blue3">EDIT</a></td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${student.school_id}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${student.l_name}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${student.f_name}</td>
                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${student.email}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${student.result == null ? 'N/A': student.result}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${student.reg_date}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ${student.account_activation_hash !== '' ? 'text-green1': 'text-red1'} border-l border-r border-black"> ${student.account_activation_hash == '' ? 'Not Yet Activated': 'Activated'}</td>
                </tr>
            `;
        });

        data.instructors.forEach(instructor => {
            instructorsList.innerHTML += `
                <tr>
                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${instructor.school_id}" class="px-4 py-2 text-white rounded-sm bg-blue3">EDIT</a></td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.school_id}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.l_name}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.f_name}</td>
                    <td class="px-5 py-5 text-sm truncate bg-white border-b border-l border-r border-black border-gray-200">${instructor.email}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.result == null ? 'N/A': instructor.result}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.reg_date}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ${instructor.account_activation_hash !== '' ? 'text-green1': 'text-red1'} border-l border-r border-black"> ${instructor.account_activation_hash == '' ? 'Not Yet Activated': 'Activated'}</td>
                </tr>
            `;
        });

        // Maintain current sort if active
        const sortBy = document.getElementById('sortBy').value;
        if (sortBy) {
            handleSort();
        }

        // Maintain search if active
        const searchTerm = document.getElementById('searchInput').value;
        if (searchTerm) {
            handleSearch();
        }
    } else {
        console.log('no new data.')
    }

    hideLoading();
}
        
</script>

<script>
    function setActiveTab(listId, button) {
        // Hide all lists
        hide('allList');
        hide('studentsList');
        hide('instructorsList');

        // Show the selected list
        show(listId, 'table-row-group');

        // Reset all buttons to default style
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => {
            btn.classList.remove('bg-blue3', 'text-white');
            btn.classList.add('bg-blue2', 'text-black'); // Reset to default
        });

        // Set the clicked button to active style
        button.classList.add('bg-blue3', 'text-white');
        button.classList.remove('bg-blue2', 'text-black'); // Remove default
    }
</script>

<script>
    function handleTypeFilter() {
        const type = document.getElementById('accountType').value;
        const rows = Array.from(document.querySelector('tbody:not(.hidden)').getElementsByTagName('tr'));

        rows.forEach(row => {
            const userType = row.cells[2].textContent.toLowerCase();
            row.style.display = !type || userType === type ? '' : 'none';
        });
    }

    function applyDateFilter() {
        const startDate = new Date(document.getElementById('startDate').value);
        const endDate = new Date(document.getElementById('endDate').value);
        const tableBodies = ['allList', 'studentsList', 'instructorsList'];

        if (startDate && endDate) {
            clearInterval(intervalID); // Stop fetching
            document.getElementById('clearDateFilter').classList.remove('hidden');

            tableBodies.forEach(bodyId => {
                const rows = Array.from(document.getElementById(bodyId).getElementsByTagName('tr'));
                rows.forEach(row => {
                    const rowDate = new Date(row.cells[6].textContent); // Registration time column
                    row.style.display = (rowDate >= startDate && rowDate <= endDate) ? '' : 'none';
                });
            });
        }
    }

    function clearDateFilter() {
        // Clear date inputs
        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
        document.getElementById('clearDateFilter').classList.add('hidden');

        // Show all rows in all table bodies
        const tableBodies = ['allList', 'studentsList', 'instructorsList'];
        tableBodies.forEach(bodyId => {
            const rows = Array.from(document.getElementById(bodyId).getElementsByTagName('tr'));
            rows.forEach(row => row.style.display = '');
        });

        // Restart fetching
        startFetching();
    }

    function exportAccounts() {
        const currentList = document.querySelector('tbody:not(.hidden)');
        const rows = Array.from(currentList.getElementsByTagName('tr'))
            .filter(row => row.style.display !== 'none');

        const accountData = rows.map(row => ({
            schoolId: row.cells[1].textContent,
            surname: row.cells[2].textContent,
            firstName: row.cells[3].textContent,
            email: row.cells[4].textContent,
            registrationTime: row.cells[6].textContent,
            activation: row.cells[7].textContent
        }));

        // Convert to CSV and download
        const headers = ['School ID', 'Surname', 'First Name', 'Email', 'Registration Time', 'Activation'];
        const csvContent = [
            headers.join(','),
            ...accountData.map(account => Object.values(account).map(v => `"${v}"`).join(','))
        ].join('\n');

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `accounts_export_${new Date().toISOString().split('T')[0]}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

<script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>

<script>
function showCreateAccountModal() {
    Swal.fire({
        title: 'Create User Account',
        html: `
            <form id="createAccountForm" class="text-left">
                <div class="mb-4">
                    <label class="block mb-1 text-sm text-grey2">User Type <span class="text-red1">*</span></label>
                    <select id="account_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                        <option value="">Select User Type</option>
                        <option value="instructor">Instructor</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <label class="block mb-1 text-sm text-grey2">First Name <span class="text-red1">*</span></label>
                        <input id="f_name" type="text" 
                               pattern="^[A-Za-z\s]{2,}$"
                               title="First name must contain at least 2 letters (no numbers or special characters)"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div class="flex-1">
                        <label class="block mb-1 text-sm text-grey2">Last Name <span class="text-red1">*</span></label>
                        <input id="l_name" type="text" 
                               pattern="^[A-Za-z\s]{2,}$"
                               title="Last name must contain at least 2 letters (no numbers or special characters)"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm text-grey2">School ID <span class="text-red1">*</span></label>
                    <input id="school_id" 
                           type="number" 
                           min="10000"
                           oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length > 10) this.value = this.value.slice(0,10);"
                           onkeydown="return event.keyCode !== 69 && event.keyCode !== 189 && event.keyCode !== 187 && event.keyCode !== 190"
                           title="School ID must be at least 5 digits"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-sm text-grey2">Email <span class="text-red1">*</span></label>
                    <input id="email" 
                           type="email" 
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                           oninput="this.value = this.value.toLowerCase();"
                           title="Please enter a valid email address"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="block mb-1 text-sm text-grey2">Password <span class="text-red1">*</span></label>
                        <input id="password" type="password" 
                               pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                               title="Password must be at least 8 characters long and contain at least one letter and one number"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div class="flex-1">
                        <label class="block mb-1 text-sm text-grey2">Confirm Password <span class="text-red1">*</span></label>
                        <input id="c_password" type="password" 
                               pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                               title="Passwords must match"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>

                <div class="mt-4 text-xs text-grey2">
                    <p><span class="text-red1">*</span> Required fields</p>
                    <p>• First and Last names must contain only letters</p>
                    <p>• School ID must be at least 5 digits</p>
                    <p>• Password must be at least 8 characters with at least one letter and one number</p>
                </div>
            </form>
        `,
        width: '600px',
        showCancelButton: true,
        confirmButtonText: 'Create Account',
        confirmButtonColor: '#03346E',
        cancelButtonText: 'Cancel',
        focusConfirm: false,
        preConfirm: () => {
            const form = document.getElementById('createAccountForm');
            const password = document.getElementById('password').value;
            const cPassword = document.getElementById('c_password').value;
            const schoolId = document.getElementById('school_id').value;
            const fName = document.getElementById('f_name').value;
            const lName = document.getElementById('l_name').value;
            const email = document.getElementById('email').value;
            const accountType = document.getElementById('account_type').value;

            // Additional validation
            if (!accountType) {
                Swal.showValidationMessage('Please select a user type');
                return false;
            }

            if (!/^[A-Za-z\s]{2,}$/.test(fName)) {
                Swal.showValidationMessage('First name must contain at least 2 letters (no numbers or special characters)');
                return false;
            }

            if (!/^[A-Za-z\s]{2,}$/.test(lName)) {
                Swal.showValidationMessage('Last name must contain at least 2 letters (no numbers or special characters)');
                return false;
            }

            if (!/^[0-9]{5,}$/.test(schoolId)) {
                Swal.showValidationMessage('School ID must be at least 5 digits');
                return false;
            }

            if (!/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email.toLowerCase())) {
                Swal.showValidationMessage('Please enter a valid email address');
                return false;
            }

            if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password)) {
                Swal.showValidationMessage('Password must be at least 8 characters long and contain at least one letter and one number');
                return false;
            }

            if (password !== cPassword) {
                Swal.showValidationMessage('Passwords do not match');
                return false;
            }

            return {
                account_type: accountType,
                f_name: fName,
                l_name: lName,
                school_id: schoolId,
                email: email.toLowerCase(),
                password: password,
                c_password: cPassword,
                create: 'create',
                encoded_accounts: '<?= htmlspecialchars($encoded_accounts, ENT_QUOTES, 'UTF-8') ?>',
                encoded_students: '<?= htmlspecialchars($encoded_students, ENT_QUOTES, 'UTF-8') ?>',
                encoded_instructors: '<?= htmlspecialchars($encoded_instructors, ENT_QUOTES, 'UTF-8') ?>'
            };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Create form and submit
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin-accounts';

            for (const key in result.value) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = result.value[key];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        }
    });
}

// Handle the response messages
<?php if(isset($success)): ?>
    Swal.fire({
        title: 'Success!',
        text: 'Account successfully created',
        icon: 'success',
        confirmButtonColor: '#03346E'
    });
<?php elseif(isset($idExists)): ?>
    Swal.fire({
        title: 'Error!',
        text: 'ID already exists, please use another ID',
        icon: 'error',
        confirmButtonColor: '#03346E'
    });
<?php elseif(isset($emailExists)): ?>
    Swal.fire({
        title: 'Error!',
        text: 'Email already exists, please use another email',
        icon: 'error',
        confirmButtonColor: '#03346E'
    });
<?php endif; ?>
</script>

<script>
function toggleFilters() {
    const filtersSection = document.getElementById('advancedFilters');
    filtersSection.classList.toggle('hidden');
}
</script>
</body>