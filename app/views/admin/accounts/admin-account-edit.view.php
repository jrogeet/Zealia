<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>
    <div class="relative block w-full h-32 py-12 px-6 min-w-[75rem]">
        <div class="relative block w-full h-[40rem] mt-2">

            <h1 class="text-3xl text-grey2 font-synemed mb-12">Edit <span class="text-black1"><?= $allUserInfo['f_name'] ?> <?= $allUserInfo['l_name'] ?></span>'s Information</h1>

            <div class="flex w-[60%] h-[90%] bg-white1 border border-black  rounded-2xl mx-auto p-6 pl-8">

                <form class="block w-[70%] h-full mx-auto" method="post" action="/admin-account-edit">
                    <input type="hidden" name="edit">
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                    <div class="flex">
                        <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['f_name'] ?>">
                        <input type="text" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['l_name'] ?>">
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['school_id'] ?>">

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['email'] ?>">
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Change Password</h1>
                    <div class="flex">
                        <input type="text" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="New Password">
                        <input type="text" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="mx-auto border border-black rounded-lg w-1/3 h-10 mt-20 bg-orange1 text-black">Save Changes</button>
                </form>

                <div class="block w-[30%] h-full mx-auto">
                    <input type="hidden" name="activate">
                    <?php if($allUserInfo['account_activation_hash'] !== null): ?>
                    <form method="post" action="/admin-account-edit" value="<?= $allUserInfo['school_id'] ?>">
                        <button type="submit" class="mx-auto border border-black rounded-lg w-full h-10 mt-8 bg-blue3 text-white">Activate Account</button>
                    </form>
                    <?php else: ?>
                        <button class="mx-auto border border-black rounded-lg w-full h-10 mt-8 bg-green-400 text-white">Activated</button>
                    <?php endif; ?>
                    
                    <form method="post" action="/admin-account-edit">
                        <input type="hidden" name="delete" value="<?= $allUserInfo['school_id'] ?>">
                        <button type="submit" class="mx-auto border border-black rounded-lg w-full h-10 mt-96 bg-red1 text-white">Delete Account</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</body>