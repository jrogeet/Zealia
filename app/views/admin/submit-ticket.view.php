<?php view('partials/head.view.php'); ?>

<body class="flex flex-col justify-between mx-auto items-center overflow-x-hidden min-h-auto h-screen w-[96rem] bg-white1">
    <?php view('partials/nav.view.php'); ?>
    <!-- MODALS -->
    <?php if(isset($sent)): ?>
    <div id="ticketSent" class="fixed left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism top-20">
        <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
            <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Ticket Sent</span>
                <button class="w-10 h-full rounded bg-red1" onClick="hide('ticketSent'); enableScroll();">X</button>
            </div>
        
            <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                <p class="text-black font-synemed">Your concern was <span class="text-green1">successfully</span> sent to us,</p>
                <p class="mb-3 font-synemed">please wait for an email for our response.</p>
                <p class="text-2xl font-synereg text-grey2">=)</p>
            </div>
        </div>
    </div>
    <?php elseif (isset($xmail)): ?>
    <div id="ticketFailed" class="fixed left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism top-20">
        <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
            <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Ticket Failed</span>
                <button class="w-10 h-full rounded bg-red1" onClick="hide('ticketFailed'); enableScroll();">X</button>
            </div>
        
            <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                <p class="text-black font-synemed">Your concern was <span class="text-red1">not sent</span></p>
                <p class="mb-3 font-synemed">please check the email format.</p>
                <p class="text-2xl font-synereg text-grey2">=(</p>
            </div>
        </div>
    </div>
    <?php elseif (isset($missing)): ?>
    <div id="ticketMissing" class="fixed left-0 z-50 flex justify-center w-screen h-screen pt-56 bg-glassmorphism top-20">
        <div class="flex flex-col justify-between h-48 border rounded-t-lg bg-white1 w-90 border-black1">
            <div class="flex items-center justify-between border rounded-t-lg bg-blue3 h-1/6 border-black1">
                <span class="w-4/5 pl-2 text-lg text-white1 font-synemed">Ticket Failed</span>
                <button class="w-10 h-full rounded bg-red1" onClick="hide('ticketMissing'); enableScroll();">X</button>
            </div>
        
            <div class="flex flex-col items-center justify-center p-4 h-5/6 ">
                <p class="text-black font-synemed">Your concern was <span class="text-red1">not sent</span></p>
                <p class="mb-3 font-synemed">please check for missing input.</p>
                <p class="text-2xl font-synereg text-grey2">=(</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <main>
        <!-- desktop -->
        <div class="font-synereg relative hidden lg:flex h-[86vh] w-full top-0 left-[50%] transform translate-x-[-50%] mt-14 py-[7vh] min-h-[42rem]">


            <div class="absolute inline-block ml-16 w-fit h-fit left-6">
                <h1 class="mb-0 text-6xl mt-14 font-synemed">Need a help?</h1></br>
                <h3 class="transform translate-y-[-49%] text-2xl">Send us a message by filling out the form</h3></br>

                <h4 class="relative text-2xl top-72">or email us at:</h4>
                <h2 class="relative text-4xl top-72 font-synemed text-blue3">ambitionxmbti@gmail.com</h2>
            </div>


            <form method="post" action="/submit-ticket" class="pt-16 pb-10 bg-white2 border border-black rounded-xl shadow-2xl absolute inline-block w-[34rem] right-0 mr-16 text-center object-center min-w-[32rem] min-h-[39rem]">
                <h1 class="mx-12 mb-16 text-4xl font-synemed">Submit a Ticket</h1>
                <div class="flex justify-between mx-16 mb-1">
                    <input class="border border-black rounded-xl transform translate-x-[15%] text-left pl-4 mb-1 h-10 w-70 text-sm bg-white1" type="text" name="f_name" id="f_name" placeholder="First Name" required>
                    <input class="border border-black rounded-xl transform translate-x-[-15%] text-left pl-4 mb-1 h-10 w-70 text-sm bg-white1" type="text" name="l_name" id="l_name" placeholder="Last Name" required>
                </div>

                <input class="relative w-2/3 h-10 pl-4 mb-2 text-sm border border-black rounded-xl bg-white1" placeholder="School number" type="number" name="school_id" id="school_id" required></input></br>
                <input class="relative w-2/3 h-10 pl-4 mb-2 text-sm border border-black rounded-xl bg-white1" placeholder="Email" type="email" name="email" required></input></br>
                <select class="relative w-2/3 h-10 pl-4 mb-2 text-sm border border-black rounded-xl bg-blue2" name="category" id="reason" placeholder="Select Category" required>
                    <option class="bg-white2" value="">Select Category:</option>
                    <option class="bg-white2" value="account">Account</option>
                    <option class="bg-white2" value="rooms">Rooms</option>
                    <option class="bg-white2" value="groups">Groups</option>
                    <option class="bg-white2" value="other">Other (specify in text box below)</option>
                </select>
                <textarea class="relative w-2/3 p-4 mb-2 text-sm border border-black form-textarea h-2/6 max-h-2/6 rounded-xl bg-white1" placeholder="Message for concern..." name="message" id="message" required></textarea></br>

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
                
                <button class="w-2/3 h-10 mt-2 mb-0 text-lg text-center text-white border font-synesemi border-blue3 bg-blue3 rounded-xl" type="submit" name="login">Submit</button></br>
            </form>
        </div>


        
        <!-- mobile -->
        <div class="relative flex flex-wrap w-screen text-left lg:hidden top-10 font-synemed">
            <div class="w-screen p-6 mx-auto h-fit bg-gradient-to-b from-blue2">
                <h1 class="text-4xl text-black1 sm:text-center font-synebold">Need Help?</h1>
                <h1 class="text-2xl text-grey2 sm:text-center">Send us a message by filling out the form.</h1>

                <h1 class="mt-20 text-2xl text-right sm:text-center text-grey2 font-synebold">or email us at:</h1>
                <h1 class="text-2xl text-right sm:text-center text-black1">ambitionxmbti@gmail.com</h1>
            </div>

            <form method="post" action="/submit-ticket" class="relative block w-screen mx-auto mt-4 h-fit bg-gradient-to-t from-blue2">
                <h1 class="mb-16 text-4xl text-center font-synemed">Submit a Ticket</h1>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white1 mb-2" type="text" name="f_name" id="f_name" placeholder="First Name" required>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white1 mb-2" type="text" name="l_name" id="l_name" placeholder="Last Name" required>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white1 mb-2" placeholder="School number" type="number" name="school_id" id="school_id" required></input>

                <input class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-white1 mb-2" placeholder="School Email" type="email" name="email" required></input>

                <select class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-14 pl-4 bg-blue2 mb-2" name="category" id="reason" placeholder="Select Category" required>
                    <option class="bg-white2" value="">Select Category:</option>
                    <option class="bg-white2" value="account">Account</option>
                    <option class="bg-white2" value="rooms">Rooms</option>
                    <option class="bg-white2" value="groups">Groups</option>
                    <option class="bg-white2" value="other">Other (specify in text box below)</option>
                </select>

                <textarea class="max-w-[300px] relative block mx-auto w-[90%] border border-black rounded-xl h-20 pl-4 bg-white1 mb-2" placeholder="Message for concern..." name="message" id="message" required></textarea>

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

                <button class="max-w-[270px] relative block mx-auto w-[70%] border border-black rounded-xl h-10 text-white1 bg-blue3 mb-2" type="submit" name="login">Submit</button></br>
            </form>
        </div>


    </main>

    <?php view('partials/footer.view.php'); ?>
    
    <script src="assets/js/shared-scripts.js"></script>
</body>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>


</html>