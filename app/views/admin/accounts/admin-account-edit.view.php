<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem] transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <!-- Header with Back Button -->
        <div class="flex items-center mb-12">
            <a href="/admin-accounts" class="flex items-center justify-center w-10 h-10 mr-4 text-2xl text-white transition-colors duration-200 border rounded-lg bg-blue3 border-black1 hover:bg-blue2">
                ←
            </a>
            <h1 class="text-3xl text-grey2 font-satoshimed">Edit <span class="text-black1"><?= $allUserInfo['f_name'] ?> <?= $allUserInfo['l_name'] ?></span>'s Information</h1>
        </div>

        <div class="flex gap-8">
            <!-- Main Account Information -->
            <div class="w-[70%]">
                <div class="p-8 bg-white border border-black shadow-md rounded-2xl">
                    <form class="space-y-6" method="post" action="/admin-account-edit">
                        <input type="hidden" name="edit">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="encoded_allUserInfo" value="<?= htmlspecialchars($encoded_allUserInfo, ENT_QUOTES, 'UTF-8')?>">
                        
                        <!-- Name Fields -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">Full Name</label>
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <input type="text" name="f_name" 
                                           class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                           placeholder="<?= $allUserInfo['f_name'] ?>">
                                    <p class="mt-1 text-xs text-grey2">First Name</p>
                                </div>
                                <div class="w-1/2">
                                    <input type="text" name="l_name" 
                                           class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                           placeholder="<?= $allUserInfo['l_name'] ?>">
                                    <p class="mt-1 text-xs text-grey2">Last Name</p>
                                </div>
                            </div>
                        </div>

                        <!-- School ID -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">School ID</label>
                            <input type="text" name="school_id" 
                                   class="w-1/2 h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                   placeholder="<?= $allUserInfo['school_id'] ?>">
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">Email Address</label>
                            <input type="email" name="email" 
                                   class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                   placeholder="<?= $allUserInfo['email'] ?>">
                        </div>

                        <!-- Password Fields -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">Change Password</label>
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <input type="password" name="password" 
                                           class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                           placeholder="New Password">
                                </div>
                                <div class="w-1/2">
                                    <input type="password" name="c_password" 
                                           class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="flex justify-end pt-4">
                            <button type="submit" 
                                    class="px-6 py-3 text-black transition-colors duration-200 border rounded-xl bg-orangeaccent border-black1 hover:bg-orange-400">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Account Actions Sidebar -->
            <div class="w-[30%] space-y-4">
                <!-- Account Status Card -->
                <div class="p-6 bg-white border border-black shadow-md rounded-2xl">
                    <h2 class="mb-4 text-lg font-medium text-grey2">Account Status</h2>
                    <?php if($allUserInfo['account_activation_hash'] !== null): ?>
                        <div class="space-y-3">
                            <div class="px-4 py-2 text-sm text-yellow-800 bg-yellow-100 rounded-lg">
                                Account pending activation
                            </div>
                            <form method="post" action="/admin-account-edit">
                                <input type="hidden" name="activate">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <button type="submit" 
                                        class="w-full px-4 py-2 text-white transition-colors duration-200 border rounded-lg bg-blue3 hover:bg-blue2">
                                    Activate Account
                                </button>
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="px-4 py-2 text-sm text-green-800 bg-green-100 rounded-lg">
                            Account activated
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Danger Zone Card -->
                <div class="p-6 bg-white border border-red-200 shadow-md rounded-2xl">
                    <h2 class="mb-4 text-lg font-medium text-red-600">Danger Zone</h2>
                    <form method="post" action="/admin-account-edit" onsubmit="return confirmDeleteAccount()">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="id" value="<?= $allUserInfo['school_id'] ?>">
                        <button type="submit" 
                                class="w-full px-4 py-2 text-red-600 transition-colors duration-200 border rounded-lg bg-red1 hover:bg-red-600 hover:text-white">
                            Delete Account
                        </button>
                    </form>
                </div>
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

    // Delete account confirmation
    function confirmDeleteAccount() {
        return Swal.fire({
            title: 'Delete Account',
            text: 'Are you sure you want to delete this account? This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            customClass: {
                confirmButton: 'swal-confirm',
                cancelButton: 'swal-cancel'
            }
        }).then((result) => {
            return result.isConfirmed;
        });
    }

    // Show error messages if present in URL
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            const error = urlParams.get('error');
            let errorMessage = '';
            
            switch(error) {
                case 'school_id_taken':
                    errorMessage = 'This school ID is already in use.';
                    break;
                default:
                    errorMessage = 'An error occurred.';
            }
            
            Swal.fire({
                title: 'Error',
                text: errorMessage,
                icon: 'error',
                customClass: {
                    confirmButton: 'swal-confirm'
                }
            });
        }
    });
    </script>
</body>