<?php view('partials/head.view.php'); ?>

<body class="absolute inline-block w-screen h-screen font-synereg bg-white1 overflow-x-hidden">
    <?php view('partials/nav.view.php')?>

    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>

    <div class="font-synereg relative top-42 max-w-2xl mx-auto rounded-lg p-8">
        <h1 class="text-[2.30rem] font-bold text-center font-synebold">Welcome to the RIASEC Test!</h1>
        <p class="text-lg mt-4 text-center px-18">Before you begin, we encourage you to take a moment to reflect on your personal interests, passions, and the activities that bring you joy.</p>
    </div></br>

    <form method="POST" action="" class="relative top-[136.50rem] left-1/2 transform translate-x-[-50%] translate-y-[-50%] w-full h-fit mb-64">

        <div class="font-synemed bg-white1 relative mt-16 left-1/2 transform translate-x-[-50%] border border-black rounded-2xl shadow-2xl w-6/12 h-fit p-0 overflow-hidden">

            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white" >I like to work on cars</span>
                </label>
            </div>

            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to do puzzles</span>
                </label>
            </div>

            <div class="group p-8 hover:bg-blue3">
            <label class="flex items-center">
                <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                <span class="ml-2 text-gray-700 group-hover:text-white">I am good at working independently</span>
            </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to work in teams</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am an ambitious person, I set goals for myself</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to organize things (files, desks/offices)</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to build things</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to read about art and music</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to have clear instructions to follow</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to try to influence or persuade people</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to do experiments</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to teach or train people</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like trying to help people solve their problems</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to take care of animals</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I wouldn’t mind working 8 hours per day in an office</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like selling things</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy creative writing</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy science</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am quick to take on new responsibilities</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am interested in healing people</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy trying to figure out how things work</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2 
                        cursor-pointer
                        bg-white2 
                        checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like putting things together or assembling things</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
            <label class="flex items-center">
                <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                        border rounded border-grey2
                        cursor-pointer
                        bg-white2
                        checked:bg-orange1">
                <span class="ml-2 text-gray-700 group-hover:text-white">I am a creative person</span>
            </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I pay attention to details</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to do filing or typing</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to analyze things (problems/situations)</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to play instruments or sing</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy learning about other cultures</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I would like to start my own business</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to cook</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like acting in plays</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am a practical person</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like working with numbers or charts</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to get into discussions about issues</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am good at keeping records of my work</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to lead</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like working outdoors</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I would like to work in an office</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I’m good at math</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like helping people</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to draw</span>
                </label>
            </div>
            <div class="group p-8 hover:bg-blue3">
                <label class="flex items-center">
                    <input type="checkbox" class="peer relative appearance-none w-5 h-5 
                            border rounded border-grey2
                            cursor-pointer
                            bg-white2
                            checked:bg-orange1">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to give speeches</span>
                </label>
            </div>


        </div>

        <button type="submit" class="font-synemed bg-orange1 w-40 h-12 relative top-1/6 left-1/2 my-16 transform translate-x-[-50%] translate-y-[-50%] border border-grey1 rounded-2xl">Submit</button>
    </form>


    <?php view('partials/footer.view.php'); ?>

    <!-- SEND TEST RESULT TO PHP: -->
    <script>
        let id = <?php echo json_encode($currentUser); ?>;
    </script>
    <script src="../assets/js/test.js"></script>
    <script src="../assets/js/shared-scripts.js"></script>
</body>
</html>

