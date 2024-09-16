<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>
    
    <div class="relative block w-full h-32 py-12 px-6 min-w-[75rem]">
        <div class="relative block w-full h-[40rem] mt-2">

            <h1 class="text-3xl font-synemed mb-12">Edit User Information</h1>

            <div class="flex w-[60%] h-[90%] border border-black  rounded-2xl mx-auto p-6 pl-8">

                <div class="block w-[70%] h-full mx-auto">
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                    <div class="flex">
                        <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="First Name"></input>
                        <input type="text" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Last Name"></input>
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="ID number"></input>

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Email"></input>
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Change Password</h1>
                    <div class="flex">
                        <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="New Password"></input>
                        <input type="text" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white1 pl-2" placeholder="Confirm Password"></input>
                    </div>

                    <button class="mx-auto border border-black rounded-lg w-1/3 h-10 mt-20 bg-red1 text-white">Delete Account</button>
                </div>

                <div class="block w-[30%] h-full mx-auto">
                    <button class="mx-auto border border-black rounded-lg w-full h-10 mt-8 bg-blue3 text-white">Activate Account</button>
                    <button class="mx-auto border border-black rounded-lg w-full h-10 mt-96 bg-orange1 text-black1">Save Changes</button>
                </div>
                
            </div>
        </div>
    </div>

</body>