<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="block w-full h-fit p-12 min-w-[75rem]">
        <h1 class="font-synebold text-black text-3xl">Ticket ID:</h1>

        <select class="text-sm h-10 w-1/6 pl-4 border border-black rounded-xl relative mb-2 bg-blue2 mt-12" name="category" id="reason" placeholder="Select Category" required>
            <option class="bg-white2" value="">Change Status:</option>
            <option class="bg-white2" value="account">Pending</option>
            <option class="bg-white2" value="rooms">Solved</option>
            <option class="bg-white2" value="groups">Unresolved</option>
        </select>

        <div class="w-[70%] h-fit border border-black1 rounded-2xl p-6 mt-12">

            <h1 class="font-synemed text-grey2 mt-2">Category</h1>
            <h1 class="font-synebold text-black1 text-2xl">Account</h1>

            <div class="flex mt-12">
                <div class="w-1/3 block">        
                    <h1 class="font-synemed text-grey2">ID Number</h1>
                    <h1 class="font-synebold text-black1 text-2xl">1234567890</h1>
                </div>
                <div class="block">        
                    <h1 class="font-synemed text-grey2">Email</h1>
                    <h1 class="font-synebold text-black1 text-2xl">studentEmail@student.fatima.edu.ph</h1>
                </div>
            </div>
            
            <div class="flex mt-12">
                <div class="w-1/3 block">        
                    <h1 class="font-synemed text-grey2">First Name</h1>
                    <h1 class="font-synebold text-black1 text-2xl">John</h1>
                </div>
                <div class="block">        
                    <h1 class="font-synemed text-grey2">Last Name</h1>
                    <h1 class="font-synebold text-black1 text-2xl">Doe</h1>
                </div>
            </div>

            
            <h1 class="font-synemed text-grey2 mt-12">Timestamp</h1>
            <h1 class="font-synebold text-black1 text-2xl">yesyes</h1>

            <h1 class="font-synemed text-grey2 mt-12">Message</h1>
            <div class="w-[70%] h-fit border border-black1 rounded-2xl p-6 mb-6 mt-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

        </div>


    </div>
</body>