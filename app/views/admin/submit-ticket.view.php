<?php view('partials/head.view.php'); ?>

<body class="bg-white1 w-screen lg:min-w-[75rem] h-fit overflow-x-hidden">
    <?php view('partials/nav.view.php'); ?>
    <!-- MODALS -->
    <?php if(isset($sent)): ?>
    <div id="ticketSent" class="z-50 flex bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
        <div class="bg-white1 flex flex-col justify-between h-48 w-90 border border-black1 rounded-t-lg">
            <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Ticket Sent</span>
                <button class="bg-red1 h-full w-10 rounded" onClick="hide('ticketSent'); enableScroll();">X</button>
            </div>
        
            <div class="h-5/6 flex flex-col justify-center items-center  p-4 ">
                <p class="font-synemed text-black">Your concern was <span class="text-green1">successfully</span> sent to us,</p>
                <p class="font-synemed mb-3">please wait for an email for our response.</p>
                <p class="text-2xl font-synereg text-grey2">=)</p>
            </div>
        </div>
    </div>
    <?php elseif (isset($xmail)): ?>
    <div id="ticketFailed" class="z-50 flex bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
        <div class="bg-white1 flex flex-col justify-between h-48 w-90 border border-black1 rounded-t-lg">
            <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Ticket Failed</span>
                <button class="bg-red1 h-full w-10 rounded" onClick="hide('ticketFailed'); enableScroll();">X</button>
            </div>
        
            <div class="h-5/6 flex flex-col justify-center items-center  p-4 ">
                <p class="font-synemed text-black">Your concern was <span class="text-red1">not sent</span></p>
                <p class="font-synemed mb-3">please check the email format.</p>
                <p class="text-2xl font-synereg text-grey2">=(</p>
            </div>
        </div>
    </div>
    <?php elseif (isset($missing)): ?>
    <div id="ticketMissing" class="z-50 flex bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
        <div class="bg-white1 flex flex-col justify-between h-48 w-90 border border-black1 rounded-t-lg">
            <div class="bg-blue3 flex justify-between items-center h-1/6 border border-black1 rounded-t-lg">
                <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Ticket Failed</span>
                <button class="bg-red1 h-full w-10 rounded" onClick="hide('ticketMissing'); enableScroll();">X</button>
            </div>
        
            <div class="h-5/6 flex flex-col justify-center items-center  p-4 ">
                <p class="font-synemed text-black">Your concern was <span class="text-red1">not sent</span></p>
                <p class="font-synemed mb-3">please check for missing input.</p>
                <p class="text-2xl font-synereg text-grey2">=(</p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <main>
        <!-- desktop -->
        <div class="font-synereg relative hidden lg:flex h-[86vh] w-full top-0 left-[50%] transform translate-x-[-50%] mt-14 py-[7vh] min-h-[42rem]">


            <div class="absolute inline-block w-fit h-fit left-6 ml-16">
                <h1 class="mt-14 mb-0 text-6xl font-synemed">Need a help?</h1></br>
                <h3 class="transform translate-y-[-49%] text-2xl">Send us a message by filling out the form</h3></br>

                <h4 class="relative top-72 text-2xl">or email us at:</h4>
                <h2 class="relative top-72 text-4xl font-synemed text-blue3">ambitionxmbti@gmail.com</h2>
            </div>


            <form method="post" action="/submit-ticket" class="pt-16 pb-10 bg-white2 border border-black rounded-xl shadow-2xl absolute inline-block w-[34rem] h-[96%] right-0 mr-16 text-center object-center min-w-[32rem] min-h-[39rem] max-h-[50rem]">
                <h1 class="font-synemed mb-16 mx-12 text-4xl">Submit a Ticket</h1>
                <div class="flex justify-between mx-16 mb-1">
                    <input class="border border-black rounded-xl transform translate-x-[15%] text-left pl-4 mb-1 h-10 w-70 text-sm bg-white1" type="text" name="f_name" id="f_name" placeholder="First Name" required>
                    <input class="border border-black rounded-xl transform translate-x-[-15%] text-left pl-4 mb-1 h-10 w-70 text-sm bg-white1" type="text" name="l_name" id="l_name" placeholder="Last Name" required>
                </div>

                <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-white1" placeholder="School number" type="number" name="school_id" id="school_id" required></input></br>
                <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-white1" placeholder="Email" type="email" name="email" required></input></br>
                <select class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-blue2" name="category" id="reason" placeholder="Select Category" required>
                    <option class="bg-white2" value="">Select Category:</option>
                    <option class="bg-white2" value="account">Account</option>
                    <option class="bg-white2" value="rooms">Rooms</option>
                    <option class="bg-white2" value="groups">Groups</option>
                    <option class="bg-white2" value="other">Other (specify in text box below)</option>
                </select>
                <textarea class="text-sm h-2/6 max-h-2/6 w-2/3 p-4 border border-black rounded-xl relative mb-2 bg-white1" placeholder="Message for concern..." name="message" id="message" required></textarea></br>
                <button class="font-synesemi text-lg h-10 w-2/3 text-center text-white border border-blue3 bg-blue3 rounded-xl mt-2 mb-0" type="submit" name="login">Submit</button></br>
            </form>
        </div>

        <!-- mobile -->
        <div class="relative flex lg:hidden flex-wrap w-screen top-10 text-left font-synemed">
            <div class="mx-auto w-screen h-fit p-6 bg-gradient-to-b from-blue2">
                <h1 class="text-4xl text-black1 sm:text-center font-synebold">Need Help?</h1>
                <h1 class="text-2xl text-grey2 sm:text-center">Send us a message by filling out the form.</h1>

                <h1 class="text-2xl text-right sm:text-center text-grey2 font-synebold mt-20">or email us at:</h1>
                <h1 class="text-2xl text-right sm:text-center text-black1">ambitionxmbti@gmail.com</h1>
            </div>

            <form method="post" action="/submit-ticket" class="relative block mx-auto w-screen h-fit mt-4 bg-gradient-to-t from-blue2">
                <h1 class="font-synemed mb-16 text-center text-4xl">Submit a Ticket</h1>

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