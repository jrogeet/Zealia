<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="z-40 relative block w-full h-fit py-12 px-6 min-w-[75rem] mb-16">
        <div class="relative flex mb-12">
            <h1 class="mx-auto font-synebold ml-6 text-3xl">Account List</h1>
            <div class="flex mx-auto w-64 font-synemed text-lg">
                <button onclick="show('studentsList','table-row-group'); hide('profsList');" class="mx-auto border border-black rounded-lg p-auto w-28 text-center bg-blue2 hover:bg-blue3 hover:text-white1">Students</button>
                <button onclick="show('profsList','table-row-group'); hide('studentsList');" class="mx-auto border border-black rounded-lg p-auto w-28 text-center bg-blue2 hover:bg-blue3 hover:text-white1">Instructors</button>
            </div>
            <div class="flex mx-auto w-fit">
                <input type="text" class="border border-black rounded-lg mx-auto bg-white1 pl-4">
                <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4 text-black1">Search</button>
            </div>
        </div>

        <div class="max-h-[31.25rem] min-w-full border border-black rounded-xl overflow-x-hidden overflow-y-auto">
            <table class="table-fixed w-full leading-normal rounded-xl">
                <thead class="min-w-[74.9rem] ">
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
                    <!-- gamit tayo injection per <tr> dito same sa tieOpt -->
                <tbody class="table-row-group" id="studentsList"> 
                    <?php foreach($students as $student): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="/admin-account-edit?id=<?= $student['school_id'] ?>" class="bg-blue3 text-white1 px-4 py-2 rounded-sm">EDIT</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $student['school_id'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $student['l_name'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $student['f_name'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm truncate border-l border-r border-black"><?= $student['email'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $student['result'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $student['reg_date'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm <?php if(isset($student['account_activation_hash'])): ?>text-red1<?php else:?>text-green1<?php endif; ?> border-l border-r border-black">
                            <?php if(isset($student['account_activation_hash'])): ?>
                                    Not Yet Activated
                            <?php else:?>
                                    Activated
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- Add more rows as needed -->
                </tbody>

                <tbody class="hidden" id="profsList"> 
                    <?php foreach($professors as $professor): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><a href="/admin-account-edit?id=<?= $professor['school_id'] ?>" class="bg-blue3 text-white1 px-4 py-2 rounded-sm">EDIT</a></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $professor['school_id'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm truncate  border-l border-r border-black"><?= $professor['l_name'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm truncate  border-l border-r border-black"><?= $professor['f_name'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm truncate  border-l border-r border-black"><?= $professor['email'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $professor['result'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black"><?= $professor['reg_date'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm <?php if(isset($student['account_activation_hash'])): ?>text-red1<?php else:?>text-green1<?php endif; ?> border-l border-r border-black">
                            <?php if(isset($student['account_activation_hash'])): ?>
                                    Not Yet Activated
                            <?php else:?>
                                    Activated
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
        

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


    <script src="assets/js/shared-scripts.js"></script>
</body>