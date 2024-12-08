<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative flex w-full h-fit py-12 px-8 min-w-[75rem] flex-1 transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">

        <?php if (isset($_SESSION['success_message'])): ?>
            <div id="success-alert" class="fixed px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded top-4 right-4">
                <span class="block sm:inline"><?= $_SESSION['success_message'] ?></span>
                <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">×</button>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <div class="flex w-full gap-8">
            <!-- Left Column - Edit Account -->
            <div class="flex-1">
                <h1 class="mb-6 text-2xl font-clashbold text-blackhead">Edit Account Information</h1>

                <div class="border bg-whitecon border-whitebord shadow-inside3 rounded-xl">
                    <div class="p-8">
                        <form method="POST" action="/admin-settings" id="settings-form">
                            <?php if (!empty($errors)): ?>
                                <div class="p-4 mb-6 text-sm rounded-lg text-rederr bg-red-50">
                                    <?php foreach ($errors as $error): ?>
                                        <p class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/></svg>
                                            <?= $error ?>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <div class="space-y-6">
                                <div>
                                    <label class="block mb-2 text-sm font-clashmed text-blacksec">Name</label>
                                    <div class="flex gap-4">
                                        <div class="flex-1">
                                            <input name="f_name" type="text" 
                                                placeholder="First Name"
                                                value="<?= htmlspecialchars($_SESSION['user']['f_name']) ?>"
                                                class="w-full px-4 py-2.5 bg-whitealt border border-whitebord rounded-lg focus:ring-2 focus:ring-blue2 focus:border-blue2 transition-colors">
                                        </div>
                                        <div class="flex-1">
                                            <input name="l_name" type="text" 
                                                placeholder="Last Name"
                                                value="<?= htmlspecialchars($_SESSION['user']['l_name']) ?>"
                                                class="w-full px-4 py-2.5 bg-whitealt border border-whitebord rounded-lg focus:ring-2 focus:ring-blue2 focus:border-blue2 transition-colors">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" 
                                    class="w-full px-6 py-3 text-sm text-white transition-all rounded-lg font-clashmed bg-blue3 hover:opacity-90 focus:ring-4 focus:ring-blue1">
                                    <span id="button-text" class="flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Save Changes
                                    </span>
                                    <span id="button-loader" class="hidden">
                                        <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Admin List -->
            <div class="w-[400px]">
                <h2 class="mb-6 text-2xl font-clashbold text-blackhead">Admin List</h2>
                
                <div class="overflow-hidden border bg-whitecon border-whitebord shadow-inside3 rounded-xl">
                    <div class="divide-y divide-whitebord">
                        <?php foreach ($admins as $admin): ?>
                        <div class="p-6 transition-colors hover:bg-whitealt">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-12 h-12 text-white rounded-full bg-blue3 font-clashmed">
                                        <?= strtoupper(substr($admin['f_name'], 0, 1) . substr($admin['l_name'], 0, 1)) ?>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm truncate font-clashmed text-blackhead">
                                        <?= htmlspecialchars($admin['f_name'] . ' ' . $admin['l_name']) ?>
                                    </p>
                                    <p class="text-sm truncate text-blackless">
                                        <?= htmlspecialchars($admin['email']) ?>
                                    </p>
                                    <p class="mt-1 text-xs text-blackless">
                                        ID: <?= htmlspecialchars($admin['school_id']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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