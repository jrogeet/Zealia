<?php view('partials/head.view.php'); ?>

<body class="font-synereg bg-white1">
    <?php view('partials/nav.view.php')?>


    <div class="pt-16 pb-10 bg-white2 border border-black rounded-xl shadow-2xl absolute left-[50%] top-[20%] transform translate-x-[-50%] w-[420px] h-fit"> 

        <h1 class="mb-14 mx-12 text-4xl text-center">Create an account</h1>

        <form method="POST" action="/login" class="login-actual-form">
        
            <div class="flex justify-between mx-16 mb-2">
                <input class="border border-black rounded-xl transform translate-x-[5%] text-left pl-4 mb-1 h-10 w-[47%] text-sm" type="text" placeholder="Last name">
                <input class="border border-black rounded-xl transform translate-x-[-5%] text-left pl-4 mb-1 h-10 w-[47%] text-sm" type="text" placeholder="First name">
            </div>

            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white1" type="text" placeholder="Student number"></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white1" type="text" placeholder="Fatima Email"></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2 bg-white1" type="text" placeholder="Password"></input></br>
            <input class="text-sm h-10 w-2/3 pl-4 border border-black rounded-xl relative left-[50%] transform translate-x-[-50%] mb-8 bg-white1" type="text" placeholder="Confirm password"></input></br>

            <button class="text-lg h-10 w-2/3 text-center text-white border border-blue3 bg-blue3 rounded-xl relative left-[50%] transform translate-x-[-50%] mb-2">Sign in</button></br>
            <h6 class="text-xs text-center mt-2 mb-0" >Already have an account? <a class="text-blue3" href="/register">Sign in</a></h6></br>

        </form>
        

    </div>





</body>