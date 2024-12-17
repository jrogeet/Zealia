<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center justify-between bg-blue1">
    <?php view('partials/nav.view.php')?>

    <main class="flex items-center justify-center w-full min-h-screen py-12 bg-gradient-to-b from-blue1 to-blue2">
        <div class="w-full max-w-md p-8 bg-white border rounded-lg shadow-lg border-black1">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-satoshimed text-black1">Forgot Password?</h1>
                <p class="mt-2 text-grey2">No worries, we'll send you reset instructions.</p>
            </div>

            <form method="post" action="/forgot" class="space-y-6" id="forgotForm">
                <div class="space-y-2">
                    <label class="block text-sm font-satoshimed text-grey2" for="email">Email Address</label>
                    <input class="w-full p-3 transition-colors border rounded-lg border-black1 focus:ring-2 focus:ring-blue3 focus:border-blue3" 
                           type="email" 
                           name="email" 
                           placeholder="Enter your email"
                           required>
                </div>

                <button class="w-full py-3 text-white transition-colors rounded-lg bg-blue3 hover:bg-blue3/90 font-satoshimed" 
                        type="submit">Send Reset Link</button>

                <div class="text-center">
                    <a href="/login" class="text-sm text-blue3 hover:underline font-satoshimed">Back to Login</a>
                </div>
            </form>
        </div>
    </main>

    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    
    <?php if(isset($sent)): ?>
    <script>
        Swal.fire({
            title: 'Reset Link Sent',
            text: 'Check your email for the password reset link',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2563EB', // blue3
            showCloseButton: true,
            footer: '<p class="text-sm text-grey2">Didn\'t receive the email? Check your spam folder or <button class="text-blue3 hover:underline" onclick="resendResetLink()">resend the link</button></p>'
        });

        function resendResetLink() {
            const form = document.getElementById('forgotForm');
            const email = form.querySelector('input[name="email"]').value;
            
            // Show loading state
            Swal.fire({
                title: 'Resending...',
                didOpen: () => {
                    Swal.showLoading();
                },
                allowOutsideClick: false,
                showConfirmButton: false
            });

            // Make API call to resend link
            fetch('/forgot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: 'Link Resent',
                    text: 'A new reset link has been sent to your email',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#2563EB'
                });
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to resend reset link. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#2563EB'
                });
            });
        }
    </script>
    <?php endif; ?>
</body>