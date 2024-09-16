<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-32 py-12 px-6 min-w-[75rem]">
        <div class="relative flex mb-12">
            <h1 class="mx-auto font-synebold ml-6 text-3xl">Account List</h1>
            <div class="flex mx-auto w-64 font-synemed text-lg">
                <button class="mx-auto border border-black rounded-lg p-auto w-28 text-center bg-blue2 hover:bg-blue3 hover:text-white1">Students</button>
                <button class="mx-auto border border-black rounded-lg p-auto w-28 text-center bg-blue2 hover:bg-blue3 hover:text-white1">Instructors</button>
            </div>
            <div class="flex mx-auto w-fit">
                <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
            </div>
        </div>

        <table class="min-w-full leading-normal border border-black rounded-xl overflow-hidden">
            <thead>
                <tr>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Edit</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">School ID</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Surname</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">First name</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Email</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Results</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Registration Time</th>
                <th class="px-0 text-center py-3 bg-blue3 text-left text-xs font-semibold text-white1 uppercase tracking-wider border-l border-r border-black">Activation</th>
                </tr>
            </thead>
            <tbody>
                <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody id="rcAccs"> 
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="/admin-account-edit" class="bg-blue3 text-white1 px-4 py-2 rounded-sm">EDIT</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">12345</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Doe</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">John</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">john.doe@example.com</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">IRC</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">2024-09-14 14:36</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black">Activated</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </tbody>
        </table>

        <div class="relative block w-full h-[40rem] mt-12">

            <h1 class="text-3xl font-synemed mb-12">Create User Account</h1>

            <div class="flex w-[60%] h-[90%] border border-black  rounded-2xl mx-auto p-6 pl-8">

                <div class="block w-[70%] h-full mx-auto">

                    <h1 class="text-grey2 mt-[5%]">User Type</h1>
                    <select class="text-sm h-10 w-1/3 pl-4 border border-black rounded-lg relative mb-2 bg-blue2" name="category" id="reason" placeholder="Select Category" required>
                        <option class="bg-white2" value="">Select User Type:</option>
                        <option class="bg-white2" value="account">Admin</option>
                        <option class="bg-white2" value="rooms">Professor</option>
                        <option class="bg-white2" value="groups">Student</option>
                    </select>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                    <div class="flex">
                        <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="First Name"></input>
                        <input type="text" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Last Name"></input>
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="ID number"></input>

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Email"></input>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Set Password</h1>
                    <div class="flex">
                        <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Password"></input>
                        <input type="text" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Confirm Password"></input>
                    </div>
                </div>

                <div class="block w-[30%] h-full mx-auto">
                    <button class="mx-auto border border-black rounded-lg w-full h-10 mt-8 bg-blue3 text-white">Activate Account</button>
                    <button class="mx-auto border border-black rounded-lg w-full h-10 mt-96 bg-orange1 text-black1">Create Account</button>
                </div>
                
            </div>
        </div>

    </div>

</body>