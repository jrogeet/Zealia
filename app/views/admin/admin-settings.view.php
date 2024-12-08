<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative flex w-full h-fit py-12 px-6 min-w-[75rem] flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">

        <?php if (isset($_SESSION['success_message'])): ?>
            <div id="success-alert" class="fixed px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded top-4 right-4">
                <span class="block sm:inline"><?= $_SESSION['success_message'] ?></span>
                <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">×</button>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <div class="relative block w-[70%] h-fit mt-2">
            <h1 class="mb-8 text-3xl font-satoshimed">Edit Account Information</h1>

            <div class="flex w-[90%] border border-black rounded-2xl ml-12 p-8">
                <div class="block w-[80%] mx-auto">
                    <form method="POST" action="/admin-settings" id="settings-form">
                        <?php if (!empty($errors)): ?>
                            <div class="mb-4 text-red-500">
                                <?php foreach ($errors as $error): ?>
                                    <p><?= $error ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label class="block mb-2 text-grey2">Name</label>
                                <div class="flex gap-4">
                                    <input name="f_name" type="text" 
                                        value="<?= htmlspecialchars($_SESSION['user']['f_name']) ?>"
                                        class="w-1/2 h-10 px-3 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:ring-1 focus:ring-blue3">
                                    <input name="l_name" type="text" 
                                        value="<?= htmlspecialchars($_SESSION['user']['l_name']) ?>"
                                        class="w-1/2 h-10 px-3 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:ring-1 focus:ring-blue3">
                                </div>
                            </div>

                            <div class="col-span-2 mt-4">
                                <button type="submit" 
                                    class="flex items-center justify-center w-full h-12 max-w-xs gap-2 transition-colors border border-black rounded-lg bg-orangeaccent text-black1 hover:bg-orange-400">
                                    <span id="button-text">Save Changes</span>
                                    <span id="button-loader" class="hidden">
                                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
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
    <script src="/assets/js/sweetalert2.min.js"></script>
    <script>
    document.getElementById('settings-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Save Changes?',
            text: 'Are you sure you want to update your account information?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save changes'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Saving changes...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Submit the form
                this.submit();
            }
        });
    });

    // Success message handler
    <?php if (isset($_SESSION['success_message'])): ?>
        Swal.fire({
            title: 'Success!',
            text: '<?= $_SESSION['success_message'] ?>',
            icon: 'success',
            timer: 2000,
            timerProgressBar: true
        });
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    // Error message handler
    <?php if (!empty($errors)): ?>
        Swal.fire({
            title: 'Error!',
            html: '<?= implode("<br>", array_map("htmlspecialchars", $errors)) ?>',
            icon: 'error'
        });
    <?php endif; ?>

    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>
</body>