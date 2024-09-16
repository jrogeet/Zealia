<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative flex w-full h-32 py-12 px-6 min-w-[75rem]">

        <div class="relative block w-[70%] h-[40rem] mt-2">
            <h1 class="text-3xl font-synemed mb-12">Edit User Information</h1>

            <div class="flex w-[80%] h-[90%] border border-black  rounded-2xl ml-12 p-6 pl-8">
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
                </div>

                <div class="block w-[30%] h-full mx-auto">
                    <button class="mx-auto border border-black rounded-lg w-full h-10 mt-[31rem] bg-orange1 text-black1">Save Changes</button>
                </div>
            </div>
        </div>

        <div class="relative block w-[30%] h-[40rem] mt-[5.7rem]">
            <div class="block w-[80%] h-[90%] border border-black rounded-2xl ml-12 overflow-hidden">
                <h1 class="w-full h-10 bg-blue3 text-center text-white1 font-synemed pt-2">Admin List</h1>

                <div class="flex w-full h-12 border-b border-black p-1">
                    <input type="text" class="w-[74%] h-[98%] mx-auto border border-grey2 rounded-lg pl-2" placeholder="Enter ID number to add">

                    <button class="w-[24%] h-[98%] mx-auto bg-orange1 font-synemed text-black1 border border-grey2 rounded-lg">Add</button>
                </div>

                
                <div class="flex w-full h-fit border-b border-black p-2">
                    <div class="block w-2/3 mx-auto ml-2">
                        <h1 class="text-xl">Surname, First Name M.</h1>
                        <h5 class="text-grey2 text-lg mb-4">1234</h5>
                        <h5 class="text-grey2">adminemail@fatima.edu.ph</h5>
                    </div>
                    <div>
                        <!-- di ko mapagana ung pic di nag lload -->
                        <button class="relative top-1/2 transform -translate-y-1/2 -translate-x-1/2 w-8 h-8 bg-red1 mx-auto text-3xl">X</button>
                        <!-- <img src="public\assets\images\icons\cross.png"> -->
                    </div>
                </div>
            </div>


        </div>

    </div>
</body>