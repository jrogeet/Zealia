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
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-clashbold text-blackhead">Admin List</h2>
                    <button onclick="showCreateAdminModal()" class="px-4 py-1 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Admin
                        </div>
                    </button>
                </div>
                
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

    function showCreateAdminModal() {
        Swal.fire({
            title: 'Create Admin Account',
            html: `
                <form id="createAdminForm" class="text-left">
                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-grey2">Account Type</label>
                        <input type="text" value="admin" class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg" readonly>
                        <input type="hidden" id="account_type" value="admin">
                    </div>
                    
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <label class="block mb-1 text-sm text-grey2">First Name</label>
                            <input id="f_name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="flex-1">
                            <label class="block mb-1 text-sm text-grey2">Last Name</label>
                            <input id="l_name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-grey2">School ID <span class="text-red1">*</span></label>
                        <input id="school_id" 
                               type="number" 
                               min="10000"
                               oninput="this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length > 10) this.value = this.value.slice(0,10);"
                               onkeydown="return event.keyCode !== 69 && event.keyCode !== 189 && event.keyCode !== 187 && event.keyCode !== 190"
                               title="School ID must be at least 5 digits"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-sm text-grey2">Email <span class="text-red1">*</span></label>
                        <input id="email" 
                               type="email" 
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                               oninput="this.value = this.value.toLowerCase();"
                               title="Please enter a valid email address"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label class="block mb-1 text-sm text-grey2">Password</label>
                            <input id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="flex-1">
                            <label class="block mb-1 text-sm text-grey2">Confirm Password</label>
                            <input id="c_password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                        </div>
                    </div>
                </form>
            `,
            width: '600px',
            showCancelButton: true,
            confirmButtonText: 'Create Admin',
            confirmButtonColor: '#03346E',
            cancelButtonText: 'Cancel',
            focusConfirm: false,
            preConfirm: () => {
                const password = document.getElementById('password').value;
                const cPassword = document.getElementById('c_password').value;

                if (password !== cPassword) {
                    Swal.showValidationMessage('Passwords do not match');
                    return false;
                }

                return {
                    account_type: 'admin',
                    f_name: document.getElementById('f_name').value,
                    l_name: document.getElementById('l_name').value,
                    school_id: document.getElementById('school_id').value,
                    email: document.getElementById('email').value,
                    password: password,
                    c_password: cPassword,
                    create: 'create'
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Create form and submit
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin-settings';

                for (const key in result.value) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = result.value[key];
                    form.appendChild(input);
                }

                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Handle the response messages
    <?php if(isset($success)): ?>
        Swal.fire({
            title: 'Success!',
            text: 'Admin account successfully created',
            icon: 'success',
            confirmButtonColor: '#03346E'
        });
    <?php elseif(isset($idExists)): ?>
        Swal.fire({
            title: 'Error!',
            text: 'ID already exists, please use another ID',
            icon: 'error',
            confirmButtonColor: '#03346E'
        });
    <?php elseif(isset($emailExists)): ?>
        Swal.fire({
            title: 'Error!',
            text: 'Email already exists, please use another email',
            icon: 'error',
            confirmButtonColor: '#03346E'
        });
    <?php endif; ?>
</script>
</body>