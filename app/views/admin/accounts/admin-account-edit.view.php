<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-32 py-12 px-6 min-w-[75rem]">
        <div class="relative block w-full h-[40rem] mt-2">
            <a href="/admin-accounts" class="px-2 text-3xl border rounded-lg bg-blue3 border-black1 text-white">◀</a>
            <h1 class="mb-12 text-3xl text-grey2 font-satoshimed">Edit <span class="text-black1"><?= $allUserInfo['f_name'] ?> <?= $allUserInfo['l_name'] ?></span>'s Information</h1>

            <div class="flex w-[60%] h-[90%] bg-white border border-black  rounded-2xl mx-auto p-6 pl-8">
                <!-- EDIT -->
                <form class="block w-[70%] h-full mx-auto" method="post" action="/admin-account-edit">
                    <input type="hidden" name="edit">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="encoded_allUserInfo" value="<?= htmlspecialchars($encoded_allUserInfo, ENT_QUOTES, 'UTF-8')?>">
                    
                    <h1 class="text-grey2 mt-[5%]">Name</h1>
                    <div class="flex">
                        <input type="text" name="f_name" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?= $allUserInfo['f_name'] ?>">
                        <input type="text" name="l_name" class="w-1/3 h-10 pl-2 ml-4 bg-white border rounded-lg border-grey2" placeholder="<?= $allUserInfo['l_name'] ?>">
                    </div>

                    <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                    <input type="text" name="school_id" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?= $allUserInfo['school_id'] ?>">

                    <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                    <input type="text" name="email" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?= $allUserInfo['email'] ?>">
                    
                    <h1 class="text-grey2 mt-[5%]">Change Password</h1>
                    <div class="flex">
                        <input type="text" name="password" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="New Password">
                        <input type="text" name="c_password" class="w-1/3 h-10 pl-2 ml-4 bg-white border rounded-lg border-grey2" placeholder="Confirm Password">
                    </div>

                    <button type="submit" class="w-1/3 h-10 mx-auto mt-20 text-black border border-black rounded-lg bg-orange1">Save Changes</button>
                </form>

                <div class="block w-[30%] h-full mx-auto">
                    <?php if($allUserInfo['account_activation_hash'] !== null): ?>
                <!-- ACTIVATE -->
                    <form method="post" action="/admin-account-edit" value="<?= $allUserInfo['school_id'] ?>">
                        <input type="hidden" name="activate">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="w-full h-10 mx-auto mt-8 text-white border border-black rounded-lg bg-blue3">Activate Account</button>
                    </form>
                    <?php else: ?>
                        <button class="w-full h-10 mx-auto mt-8 text-white bg-green-400 border border-black rounded-lg">Activated</button>
                    <?php endif; ?>
                    
                <!-- DELETE -->
                    <form method="post" action="/admin-account-edit">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="w-full h-10 mx-auto text-white border border-black rounded-lg mt-96 bg-red1">Delete Account</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</body>