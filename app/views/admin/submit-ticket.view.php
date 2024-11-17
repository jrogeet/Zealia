<?php view('partials/head.view.php'); ?>

<body class="bg-blue1 w-screen lg:min-w-[75rem] h-fit overflow-x-hidden">
    <?php view('partials/nav.view.php'); ?>
    
    <?php if(isset($sent) || isset($xmail) || isset($missing)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                <?php if(isset($sent)): ?>
                    Swal.fire({
                        title: 'Ticket Sent',
                        html: 'Your concern was <span class="text-green-500">successfully</span> sent to us,<br>please wait for an email for our response.<br>=)',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            popup: 'swal-popup',
                            confirmButton: 'swal-confirm'
                        }
                    });
                <?php elseif(isset($xmail)): ?>
                    Swal.fire({
                        title: 'Ticket Failed',
                        html: 'Your concern was <span class="text-red-500">not sent</span><br>please check the email format.<br>=(',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            popup: 'swal-popup',
                            confirmButton: 'swal-confirm'
                        }
                    });
                <?php elseif(isset($missing)): ?>
                    Swal.fire({
                        title: 'Ticket Failed',
                        html: 'Your concern was <span class="text-red-500">not sent</span><br>please check for missing input.<br>=(',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            popup: 'swal-popup',
                            confirmButton: 'swal-confirm'
                        }
                    });
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>

    <main>
        <!-- desktop -->
        <div class="font-satoshimed relative hidden lg:flex h-[86vh] w-full top-0 left-[50%] transform translate-x-[-50%] my-14 py-[7vh] min-h-[42rem]">


            <div class="absolute inline-block ml-16 w-fit h-fit left-6">
                <h1 class="mb-0 text-6xl mt-14 font-satoshimed">Need a help?</h1></br>
                <h3 class="transform translate-y-[-49%] text-2xl">Send us a message by filling out the form</h3></br>

                <h4 class="relative text-2xl top-72">or email us at:</h4>
                <h2 class="relative text-4xl top-72 font-satoshimed text-blue3">ambitionxmbti@gmail.com</h2>
            </div>


            <form id="ticketForm" method="POST" action="/submit-ticket" class="pt-16 pb-10 bg-whitecon border border-black rounded-xl shadow-2xl absolute inline-block w-[34rem] right-0 mr-16 text-center object-center min-w-[32rem] min-h-[39rem]">
                <h1 class="mx-12 mb-16 text-4xl font-satoshimed">Submit a Ticket</h1>
                <div class="flex justify-between mx-16 mb-1">
                    <input class="border border-black rounded-xl transform translate-x-[15%] text-left pl-4 mb-1 h-10 w-[40%] text-sm bg-white" type="text" name="f_name" id="f_name" placeholder="First Name *" required>
                    <input class="border border-black rounded-xl transform translate-x-[-15%] text-left pl-4 mb-1 h-10 w-[45%] text-sm bg-white" type="text" name="l_name" id="l_name" placeholder="Last Name (optional)">
                </div>

                <input class="relative w-2/3 h-10 pl-4 mb-2 text-sm bg-white border border-black rounded-xl" placeholder="School number *" type="number" name="school_id" id="school_id" required></input></br>
                <input class="relative w-2/3 h-10 pl-4 mb-2 text-sm bg-white border border-black rounded-xl" placeholder="Email *" type="email" name="email" required></input></br>
                <select class="relative w-2/3 h-10 pl-4 mb-2 text-sm border border-black rounded-xl bg-blue2" name="category" id="reason" required>
                    <option class="bg-white2" value="">Select Category *</option>
                    <option class="bg-white2" value="account">Account</option>
                    <option class="bg-white2" value="rooms">Rooms</option>
                    <option class="bg-white2" value="groups">Groups</option>
                    <option class="bg-white2" value="other">Other (specify in text box below)</option>
                </select>
                <textarea class="relative w-2/3 p-4 mb-2 text-sm bg-white border border-black h-2/6 max-h-2/6 rounded-xl" placeholder="Message for concern... *" name="message" id="message" required></textarea></br>

                <?php if (hasInternetConnection()): ?>
                <!-- Show reCAPTCHA when there's internet -->
                    <div class="g-recaptcha pl-14 rounded-xl relative left-[50%] transform translate-x-[-50%] mt-4" data-sitekey="<?= $config['recaptcha']['site_key'] ?>"></div>
                <?php else: ?>
                    <!-- Add a hidden input when there's no internet -->
                    <input type="hidden" name="g-recaptcha-response" value="offline">
                <?php endif; ?>
                
                <?php if (isset($errors['recaptcha'])): ?>
                    <p class="my-0 text-sm text-center text-red-600"><?= $errors['recaptcha'] ?></p>
                <?php endif; ?>
                
                <button class="w-2/3 h-10 mt-2 mb-0 text-lg text-center text-white border font-satoshiblack border-blue3 bg-blue3 rounded-xl" type="submit" name="login">Submit</button></br>
            </form>
        </div>


        
        <!-- mobile -->
        <div class="relative flex flex-wrap w-screen text-left lg:hidden top-10 font-satoshimed">
            <div class="w-screen p-6 mx-auto h-fit bg-gradient-to-b from-blue2">
                <h1 class="text-4xl text-black1 sm:text-center font-clashbold">Need Help?</h1>
                <h1 class="text-2xl text-grey2 sm:text-center">Send us a message by filling out the form.</h1>

                <h1 class="mt-20 text-2xl text-right sm:text-center text-grey2 font-clashbold">or email us at:</h1>
                <h1 class="text-2xl text-right sm:text-center text-black1">ambitionxmbti@gmail.com</h1>
            </div>

            <form method="POST" action="/submit-ticket" class="relative block w-screen mx-auto mt-4 h-fit bg-gradient-to-t from-blue2">
                <h1 class="mb-16 text-4xl text-center font-satoshimed">Submit a Ticket</h1>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white mb-2" type="text" name="f_name" id="f_name" placeholder="First Name *" required>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white mb-2" type="text" name="l_name" id="l_name" placeholder="Last Name">

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white mb-2" placeholder="School number *" type="number" name="school_id" id="school_id" required></input>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white mb-2" placeholder="School Email *" type="email" name="email" required></input>

                <select class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-blue2 mb-2" name="category" id="reason" required>
                    <option class="bg-white2" value="">Select Category *</option>
                    <option class="bg-white2" value="account">Account</option>
                    <option class="bg-white2" value="rooms">Rooms</option>
                    <option class="bg-white2" value="groups">Groups</option>
                    <option class="bg-white2" value="other">Other (specify in text box below)</option>
                </select>

                <textarea class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-20 pl-4 bg-white mb-2" placeholder="Message for concern... *" name="message" id="message" required></textarea>

                <?php if (hasInternetConnection()): ?>
                <!-- Show reCAPTCHA when there's internet -->
                <div class="g-recaptcha pl-14 rounded-xl relative left-[50%] transform translate-x-[-50%] mt-4" data-sitekey="<?= $config['recaptcha']['site_key'] ?>"></div>
                <?php else: ?>
                    <!-- Add a hidden input when there's no internet -->
                    <input type="hidden" name="g-recaptcha-response" value="offline">
                <?php endif; ?>
                
                <?php if (isset($errors['recaptcha'])): ?>
                    <p class="my-0 text-sm text-center text-red-600"><?= $errors['recaptcha'] ?></p>
                <?php endif; ?>

                <button class="max-w-[270px] relative block mx-auto w-[70%] border border-black rounded-xl h-10 text-white bg-blue3 mb-2" type="submit" name="login">Submit</button></br>
            </form>
        </div>


    </main>

    <?php view('partials/footer.view.php'); ?>
    
    <script src="assets/js/shared-scripts.js"></script>
    <script src="/assets/js/sweetalert2.min.js"></script>
</body>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

    /* Add this for red asterisk styling */
    input::placeholder,
    textarea::placeholder,
    select option:first-child {
        color: #666;
    }
    
    input::placeholder[required]::after,
    textarea::placeholder[required]::after,
    select[required] option:first-child::after {
        content: " *";
        color: red;
    }
</style>

<script>
document.getElementById('ticketForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    try {
        const formData = new FormData(this);
        const response = await fetch('/submit-ticket', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            Swal.fire({
                title: 'Ticket Sent',
                html: 'Your concern was <span class="text-green-500">successfully</span> sent to us,<br>please wait for an email for our response.<br>=)',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'swal-popup',
                    confirmButton: 'swal-confirm'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/submit-ticket';
                }
            });
        } else {
            let errorMessage = 'Please check your input and try again.';
            let errorTitle = 'Ticket Failed';
            
            if (result.error === 'xmail') {
                errorMessage = 'Please check the email format.<br>=('
            } else if (result.error === 'missing') {
                errorMessage = 'Please check for missing input.<br>=('
            }
            
            Swal.fire({
                title: errorTitle,
                html: `Your concern was <span class="text-red-500">not sent</span><br>${errorMessage}`,
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'swal-popup',
                    confirmButton: 'swal-confirm'
                }
            });
        }
    } catch (error) {
        console.error('Error:', error);
        Swal.fire({
            title: 'Error',
            text: 'An unexpected error occurred. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
});
</script>

</html>