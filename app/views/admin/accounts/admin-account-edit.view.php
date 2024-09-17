<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-32 py-12 px-6 min-w-[75rem]">
        <div class="relative block w-full h-[40rem] mt-2">

            <h1 class="text-3xl text-grey2 font-synemed mb-12">Edit <span class="text-black1"><?= $allUserInfo['f_name'] ?> <?= $allUserInfo['l_name'] ?></span>'s Information</h1>

            <div class="flex w-[60%] h-[90%] bg-white1 border border-black  rounded-2xl mx-auto p-6 pl-8">
                <!-- EDIT -->
                <form class="block w-[70%] h-full mx-auto" method="post" action="/admin-account-edit">
                    <input type="hidden" name="edit">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="encoded_allUserInfo" value="<?= htmlspecialchars($encoded_allUserInfo, ENT_QUOTES, 'UTF-8')?>">
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                    <div class="flex">
                        <input type="text" name="f_name" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['f_name'] ?>">
                        <input type="text" name="l_name" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['l_name'] ?>">
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input type="text" name="school_id" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['school_id'] ?>">

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input type="text" name="email" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="<?= $allUserInfo['email'] ?>">
                    
                    <h1 class="text-grey2 mt-[5%] mt-4">Change Password</h1>
                    <div class="flex">
                        <input type="text" name="password" class="ml-0 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="New Password">
                        <input type="text" name="c_password" class="ml-4 w-1/3 h-10 border border-grey2 rounded-lg bg-white pl-2" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="mx-auto border border-black rounded-lg w-1/3 h-10 mt-20 bg-orange1 text-black">Save Changes</button>
                </form>

                <div class="block w-[30%] h-full mx-auto">
                    <?php if($allUserInfo['account_activation_hash'] !== null): ?>
                <!-- ACTIVATE -->
                    <form method="post" action="/admin-account-edit" value="<?= $allUserInfo['school_id'] ?>">
                        <input type="hidden" name="activate">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="mx-auto border border-black rounded-lg w-full h-10 mt-8 bg-blue3 text-white">Activate Account</button>
                    </form>
                    <?php else: ?>
                        <button class="mx-auto border border-black rounded-lg w-full h-10 mt-8 bg-green-400 text-white">Activated</button>
                    <?php endif; ?>
                    
                <!-- DELETE -->
                    <form method="post" action="/admin-account-edit">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="mx-auto border border-black rounded-lg w-full h-10 mt-96 bg-red1 text-white">Delete Account</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</body>