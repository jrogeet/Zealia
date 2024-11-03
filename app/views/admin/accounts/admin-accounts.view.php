<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="z-40 relative block w-full h-fit py-12 px-6 min-w-[75rem] mb-16">
        <div class="relative flex mb-12">
            <h1 class="mx-auto ml-6 text-3xl font-synebold">Account List</h1>
            <div class="flex w-64 mx-auto text-lg font-synemed">
                <button onclick="show('allList','table-row-group'); hide('studentsList'); hide('profsList');" class="mx-auto text-center border border-black rounded-lg p-auto w-28 bg-blue2 hover:bg-blue3 hover:text-white1">All</button>
                <button onclick="show('studentsList','table-row-group'); hide('allList'); hide('profsList');" class="mx-auto text-center border border-black rounded-lg p-auto w-28 bg-blue2 hover:bg-blue3 hover:text-white1">Students</button>
                <button onclick="show('instructorsList','table-row-group'); hide('allList'); hide('studentsList');" class="mx-auto text-center border border-black rounded-lg p-auto w-28 bg-blue2 hover:bg-blue3 hover:text-white1">Instructors</button>
            </div>
            <form method="POST" action="/admin-accounts" class="flex mx-auto w-fit">
                <input name="search_input" type="text" placeholder="Search..." class="pl-4 mx-auto border border-black rounded-lg bg-white1" required>
                <input type="hidden" name="search">
                <input type="hidden" name="encoded_students" value="<?= htmlspecialchars($encoded_students, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_professors" value="<?= htmlspecialchars($encoded_professors, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_accounts" value="<?= htmlspecialchars($encoded_accounts, ENT_QUOTES, 'UTF-8')?>">
                <button type="submit" class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
            </form>
        </div>

        <div class="max-h-[31.25rem] min-w-full border border-black rounded-xl overflow-x-hidden overflow-y-auto">
            <table class="w-full leading-normal table-fixed rounded-xl">
                <thead class="min-w-[74.9rem] ">
                    <tr>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Edit</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">School ID</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Surname</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">First name</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Email</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Results</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Registration Time</th>
                        <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Activation</th>
                    </tr>
                </thead>
                    <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody class="table-row-group" id="allList"> 

                <!-- Add more rows as needed -->
                </tbody>

                <tbody class="hidden" id="studentsList"> 

                    <!-- Add more rows as needed -->
                </tbody>

                <tbody class="hidden" id="instructorsList"> 

                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        
        <!-- MODALS -->
        <?php if(isset($success)): ?>
        <div id="success" class="fixed top-0 left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism">
            <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
                <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                    <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Account created</span>
                    <button class="w-10 h-full rounded bg-red1" onClick="hide('success'); enableScroll();">X</button>
                </div>
            
                <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                    <p class="text-black font-synemed">Account <span class="text-green1">successfully</span> created,</p>
                    <p class="mb-3 font-synemed"></p>
                    <p class="text-2xl font-synereg text-grey2">=)</p>
                </div>
            </div>
        </div>
        <?php elseif(isset($idExists)): ?>
            <div id="idExists" class="fixed top-0 left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism">
                <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Ticket Sent</span>
                        <button class="w-10 h-full rounded bg-red1" onClick="hide('idExists'); enableScroll();">X</button>
                    </div>
                
                    <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                        <p class="text-black font-synemed">Your concern was <span class="text-green1">successfully</span> sent to us,</p>
                        <p class="mb-3 font-synemed">please wait for an email for our response.</p>
                        <p class="text-2xl font-synereg text-grey2">=)</p>
                    </div>
                </div>
            </div>
        <?php elseif(isset($emailExists)): ?>
            <div id="emailExists" class="fixed top-0 left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism">
                <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
                    <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                        <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Ticket Sent</span>
                        <button class="w-10 h-full rounded bg-red1" onClick="hide('emailExists'); enableScroll();">X</button>
                    </div>
                
                    <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                        <p class="text-black font-synemed">Your concern was <span class="text-green1">successfully</span> sent to us,</p>
                        <p class="mb-3 font-synemed">please wait for an email for our response.</p>
                        <p class="text-2xl font-synereg text-grey2">=)</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="relative block w-full h-[40rem] mt-12">
            
            <h1 class="mb-12 text-3xl font-synemed">Create User Account</h1>

            <form method="POST" action="/admin-accounts" class="flex w-[60%] h-[90%] border border-black  rounded-2xl mx-auto p-6 pl-8">
                <input type="hidden" name="encoded_accounts" value="<?= htmlspecialchars($encoded_accounts, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_students" value="<?= htmlspecialchars($encoded_students, ENT_QUOTES, 'UTF-8')?>">
                <input type="hidden" name="encoded_professors" value="<?= htmlspecialchars($encoded_professors, ENT_QUOTES, 'UTF-8')?>">
                
                <div class="block w-[70%] h-full mx-auto">

                    <h1 class="text-grey2 mt-[5%]">User Type</h1>
                    <select name="account_type" class="relative w-1/3 h-10 pl-4 mb-2 text-sm border border-black rounded-lg bg-blue2" name="category" id="reason" placeholder="Select Category" required>
                        <option class="bg-white2" value="">Select User Type:</option>
                        <option class="bg-white2" value="account">Admin</option>
                        <option class="bg-white2" value="rooms">Professor</option>
                        <option class="bg-white2" value="groups">Student</option>
                    </select>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                    <div class="flex">
                        <input name="f_name" type="text" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="First Name" required></input>
                        <input name="l_name" type="text" class="w-1/3 h-10 pl-2 ml-4 border rounded-lg border-grey2 bg-white1" placeholder="Last Name" required></input>
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input name="school_id" type="number" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="ID number" required></input>

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input name="email" type="email" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="Email" required></input>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Set Password</h1>
                    <div class="flex">
                        <input name="password" type="text" class="w-1/3 h-10 pl-2 ml-0 border rounded-lg border-grey2 bg-white1" placeholder="Password" required></input>
                        <input name="c_password" type="text" class="w-1/3 h-10 pl-2 ml-4 border rounded-lg border-grey2 bg-white1" placeholder="Confirm Password" required></input>
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

        document.addEventListener('DOMContentLoaded', function() {
            fetchLatestData({
                "table": "accounts",
                "currentPage": "admin_accounts",
            }, displayAccounts, 3000);
        });

        function displayAccounts(data) {
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
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${user.result}</td>
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
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${student.result}</td>
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
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.result}</td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-l border-r border-black border-gray-200">${instructor.reg_date}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ${instructor.account_activation_hash !== '' ? 'text-green1': 'text-red1'} border-l border-r border-black"> ${instructor.account_activation_hash == '' ? 'Not Yet Activated': 'Activated'}</td>
                        </tr>
                    `;
                    
                });
            } else {
                console.log('no new data.')
            }
        }
        
    </script>
</body>