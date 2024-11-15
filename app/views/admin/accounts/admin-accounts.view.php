<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="z-40 relative block w-full h-fit py-12 px-6 min-w-[75rem] mb-16">
        <div class="flex justify-between mb-12">
            <h1 class="mx-auto ml-6 text-3xl font-clashbold">Account List</h1>
            <div class="flex w-64 gap-2 mx-auto text-lg font-satoshimed">
                <button onclick="show('allList','table-row-group'); hide('studentsList'); hide('profsList');" class="px-2 mx-auto text-center border border-black rounded-lg p-auto w-28 bg-blue2 hover:bg-blue3 hover:text-white1">All</button>
                <button onclick="show('studentsList','table-row-group'); hide('allList'); hide('profsList');" class="px-2 mx-auto text-center border border-black rounded-lg p-auto w-28 bg-blue2 hover:bg-blue3 hover:text-white1">Students</button>
                <button onclick="show('instructorsList','table-row-group'); hide('allList'); hide('studentsList');" class="px-2 mx-auto text-center border border-black rounded-lg p-auto w-28 bg-blue2 hover:bg-blue3 hover:text-white1">Instructors</button>
            </div>
            <div class="flex gap-4 mx-auto w-fit">
                <div class="flex items-center">
                    <select id="sortBy" class="pl-4 mx-auto border border-black rounded-lg bg-white1" onchange="handleSort()">
                        <option value="">Sort by...</option>
                        <option value="date_asc">Date (Oldest First)</option>
                        <option value="date_desc">Date (Newest First)</option>
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                    </select>
                    <button id="clearSort" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSort()">X</button>
                </div>
                <div class="flex items-center">
                    <input id="searchInput" oninput="handleSearch();" type="text" placeholder="Search..." class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                    <button id="clearSearch" class="hidden w-10 mx-2 text-xl text-red1" onclick="clearSearch()">X</button>
                </div>
            </div>
        </div>
    
        <div class="hidden" id="searchResultsHead">
            <h2>Search Results for: <span id="searchTerm"></span></h2>
        </div>
        
        <div class="border border-black rounded-xl overflow-hidden">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">Edit</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">School ID</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">Surname</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">First name</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">Email</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">Results</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">Registration Time</th>
                                <th class="sticky top-0 px-0 py-3 text-xs font-semibold tracking-wider text-center uppercase border-black border-x bg-blue3 text-white1">Activation</th>
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
            <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
                <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                    <span class="w-4/5 pl-2 text-lg text-white1 font-satoshimed">Account created</span>
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
                <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white1 font-satoshimed">Ticket Sent</span>
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
                <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white1 font-satoshimed">Warning</span>
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

        <div class="relative block w-full h-[40rem] mt-12">
            
            <h1 class="mb-12 text-3xl font-satoshimed">Create User Account</h1>

            <form method="POST" action="/admin-accounts" class="flex w-[60%] h-[90%] border border-black  rounded-2xl mx-auto p-6 pl-8">
                <input type="hidden" name="encoded_accounts" value="<?= htmlspecialchars($encoded_accounts, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_students" value="<?= htmlspecialchars($encoded_students, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_instructors" value="<?= htmlspecialchars($encoded_instructors, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="create" value="create">
                    
                <div class="block w-[70%] h-full mx-auto">

                    <h1 class="text-grey2 mt-[5%]">User Type</h1>
                    <select name="account_type" class="relative w-1/3 h-10 pl-4 mb-2 text-sm border border-black rounded-lg bg-blue2" name="category" id="reason" placeholder="Select Category" required>
                        <option class="bg-white2" value="">Select User Type:</option>
                        <option class="bg-white2" value="admin">Admin</option>
                        <option class="bg-white2" value="instructor">instructor</option>
                        <option class="bg-white2" value="student">Student</option>
                    </select>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                    <div class="flex">
                        <input name="f_name" type="text" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="First Name" required>
                        <input name="l_name" type="text" class="w-1/3 h-10 pl-2 ml-4 border rounded-lg border-grey2 bg-white1" placeholder="Last Name" required>
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input name="school_id" type="number" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="ID number" required>

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input name="email" type="email" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="Email" required>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Set Password</h1>
                    <div class="flex">
                        <input name="password" type="text" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="Password" required>
                        <input name="c_password" type="text" class="w-1/3 h-10 pl-2 ml-4 border rounded-lg border-grey2 bg-white1" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="block w-[30%] h-full mx-auto">
                    <button type="submit" class="w-full h-10 mx-auto border border-black rounded-lg mt-96 bg-orange1 text-black1">Create Account</button>
                </div>
                
            </form>
        </div>

    </div>


    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/fetch/fetch.js"></script>

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
                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${user.school_id}" class="px-4 py-2 rounded-sm bg-blue3 text-white1">EDIT</a></td>
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
                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${student.school_id}" class="px-4 py-2 rounded-sm bg-blue3 text-white1">EDIT</a></td>
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
                    <td class="px-5 py-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200"><a href="/admin-account-edit?id=${instructor.school_id}" class="px-4 py-2 rounded-sm bg-blue3 text-white1">EDIT</a></td>
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
}
        
    </script>
</body>