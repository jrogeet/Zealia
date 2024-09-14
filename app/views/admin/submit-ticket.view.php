<?php view('partials/head.view.php'); ?>

<body class="bg-white1 min-w-[75rem]">
    <?php view('partials/nav.view.php'); ?>
    
    <main>
        <div class="font-synereg relative flex h-[86vh] w-full top-0 left-[50%] transform translate-x-[-50%] mt-14 mb-12 py-16">
            <div class="absolute inline-block w-fit h-fit left-6 ml-16">

                <h1 class="mt-14 mb-0 text-6xl font-synemed">Need a help?</h1></br>
                <h3 class="transform translate-y-[-49%] text-2xl">Send us a message by filling out the form</h3></br>

                <h4 class="relative top-72 text-2xl">or email us at:</h4>
                <h2 class="relative top-72 text-4xl font-synemed text-blue3">ambitionxmbti@gmail.com</h2>

            </div>


            <div class="pt-16 pb-10 bg-white2 border border-black rounded-xl shadow-2xl absolute inline-block w-[34rem] h-[93%] right-0 mr-16 text-center object-center min-w-[32rem]">
                <h1 class="font-synemed mb-16 mx-12 text-4xl">Submit a Ticket</h1>
                <div class="flex justify-between mx-16 mb-1">
                    <input class="border border-black rounded-xl transform translate-x-[15%] text-left pl-4 mb-1 h-10 w-70 text-sm bg-white1" type="text" placeholder="First name" type="text" name="fname" required>
                    <input class="border border-black rounded-xl transform translate-x-[-15%] text-left pl-4 mb-1 h-10 w-70 text-sm bg-white1" type="text" placeholder="Last name" type="text" name="lname" required>
                </div>

                <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-white1" placeholder="Student number" type="number" name="school_id" id="school_id" required></input></br>
                <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-white1" placeholder="Fatima Email" type="email" name="email" required></input></br>
                <select class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-blue2" name="category" id="reason" placeholder="Select Category" required>
                    <option class="bg-white2" value="">Select Category:</option>
                    <option class="bg-white2" value="account">Account</option>
                    <option class="bg-white2" value="rooms">Rooms</option>
                    <option class="bg-white2" value="groups">Groups</option>
                    <option class="bg-white2" value="other">Other (specify in message)</option>
                </select>
                <input class="text-sm h-2/6 w-2/3 pl-4 border border-black rounded-xl relative mb-2 bg-white1" placeholder="Add details..." type="number" name="school_id" id="school_id" required></input></br>
                <button class="font-synesemi text-lg h-10 w-2/3 text-center text-white border border-blue3 bg-blue3 rounded-xl mt-2 mb-0" type="submit" name="login">Submit</button></br>
            


            </div>
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