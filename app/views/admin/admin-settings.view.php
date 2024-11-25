<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative flex w-full h-fit py-12 px-6 min-w-[75rem] flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">

        <div class="relative block w-[70%] h-[40rem] mt-2">
            <h1 class="mb-12 text-3xl font-satoshimed">Edit Account Information</h1>

            <div class="flex w-[80%] h-[90%] border border-black  rounded-2xl ml-12 p-6 pl-8">
                <div class="block w-[70%] h-full mx-auto">
                    <form method="POST" action="/admin-settings">
                        <?php if (!empty($errors)): ?>
                            <div class="mb-4 text-red-500">
                                <?php foreach ($errors as $error): ?>
                                    <p><?= $error ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <h1 class="text-grey2 mt-[5%] mt-4">Name</h1>
                        <div class="flex">
                            <input name="f_name" type="text" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?php echo "{$_SESSION['user']['f_name']}"; ?>">
                            <input name="l_name" type="text" class="w-1/3 h-10 pl-2 ml-4 bg-white border rounded-lg border-grey2" placeholder="<?php echo "{$_SESSION['user']['l_name']}"; ?>">
                        </div>

                        <h1 class="text-grey2 mt-[5%] mt-4">School number</h1>
                        <input name="school_id" type="text" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?php echo "{$_SESSION['user']['school_id']}"; ?>">

                        <h1 class="text-grey2 mt-[5%] mt-4">Email</h1>
                        <input name="email" type="text" class="w-1/2 h-10 px-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="<?php echo "{$_SESSION['user']['email']}"; ?>">
                        
                        <h1 class="text-grey2 mt-[5%] mt-4">Change Password</h1>
                        <div class="flex">
                            <input name="password" type="password" class="w-1/3 h-10 pl-2 ml-0 bg-white border rounded-lg border-grey2" placeholder="New Password">
                            <input name="c_password" type="password" class="w-1/3 h-10 pl-2 ml-4 bg-white border rounded-lg border-grey2" placeholder="Confirm Password">
                        </div>

                        <div class="block w-[30%] h-full mx-auto">
                            <button type="submit" class="w-full h-10 mx-auto border border-black rounded-lg mt-[8rem] bg-orangeaccent text-black1">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="relative block w-[40%] h-[40rem] mt-[5.7rem]">
            <div class="block w-[80%] h-[90%] border border-black rounded-2xl ml-12 overflow-hidden">
                <h1 class="w-full h-10 pt-2 text-center text-white bg-blue3 font-satoshimed">Admin List</h1>

                <?php foreach ($admins as $admin): ?>
                <div class="flex w-full p-2 border-b border-black h-fit">
                    <div class="block w-full mx-auto ml-2">
                        <div class="flex flex-col">
                            <h5 class="">Name:</h5>
                            <h1 class="text-lg"><?= htmlspecialchars($admin['l_name'] . ', ' . $admin['f_name']) ?></h1>
                        </div>
                        <div class="flex flex-col">
                            <h5 class="">Admin ID: </h5>
                            <h5 class="mb-4 text-base text-grey2"><?= htmlspecialchars($admin['school_id']) ?></h5>
                        </div>

                        <div class="flex flex-col">
                            <h5 class="">Email:</h5>
                            <h5 class="text-grey2"><?= htmlspecialchars($admin['email']) ?></h5>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>


        </div>

    </div>

    <script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>
</body>