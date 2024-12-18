<?php view('partials/head.view.php'); ?>

<body class="absolute inline-block w-screen h-auto overflow-x-hidden bg-beige font-satoshimed">

    <?php 
        view('partials/nav.view.php');
    ?>

    <main class="min-h-screen pb-24">
        <div class="relative max-w-2xl p-8 mx-auto mt-16 rounded-lg font-satoshimed">
            <h1 class="text-[2.30rem] font-bold text-center font-clashbold">Welcome to the RIASEC Test!</h1>
            <p class="mt-4 text-lg text-center px-18">Before you begin, we encourage you to take a moment to reflect on your personal interests, passions, and the activities that bring you joy.</p>
            <div class="mt-4 mb-8 text-center">
                <span id="progress-text" class="text-gray-600">Page 1 of 6</span>
                <div class="w-full h-2 mt-2 bg-gray-200 rounded-full">
                    <div id="progress-bar" class="h-2 rounded-full bg-orangeaccent" style="width: 16.67%"></div>
                </div>
            </div>
        </div>

        <div class="w-6/12 h-auto p-0 mx-auto overflow-hidden bg-white border border-black shadow-2xl font-satoshimed rounded-2xl">
            <div id="questions-container">
                <!-- Questions will be paginated here via JavaScript -->
                <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white" id="R">I like to work on cars</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to do puzzles</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am good at working independently</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to work in teams</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am an ambitious person, I set goals for myself</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to organize things (files, desks/offices)</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to build things</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to read about art and music</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to have clear instructions to follow</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to try to influence or persuade people</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to do experiments</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to teach or train people</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like trying to help people solve their problems</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to take care of animals</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I wouldn’t mind working 8 hours per day in an office</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like selling things</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy creative writing</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy science</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am quick to take on new responsibilities</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am interested in healing people</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy trying to figure out how things work</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like putting things together or assembling things</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am a creative person</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I pay attention to details</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to do filing or typing</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to analyze things (problems/situations)</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to play instruments or sing</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I enjoy learning about other cultures</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I would like to start my own business</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to cook</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like acting in plays</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am a practical person</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like working with numbers or charts</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to get into discussions about issues</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I am good at keeping records of my work</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to lead</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="R" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like working outdoors</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="C" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I would like to work in an office</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="I" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I’m good at math</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="S" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like helping people</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="A" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to draw</span>
                </label>
            </div>
            <div class="group hover:bg-blue3">
                <label class="flex items-center w-full p-8 cursor-pointer">
                    <input type="checkbox" id="E" class="relative w-5 h-5 border rounded appearance-none cursor-pointer peer min-w-5 border-grey2 bg-beige checked:bg-orangeaccent">
                    <span class="ml-2 text-gray-700 group-hover:text-white">I like to give speeches</span>
                </label>
            </div>
            </div>
            
            <div class="flex justify-between p-6 border-t border-gray-200">
                <button id="prev-btn" class="px-6 py-2 text-gray-600 border rounded-lg hover:bg-gray-100" disabled>Previous</button>
                <button id="next-btn" class="px-6 py-2 text-white border rounded-lg bg-orangeaccent hover:bg-orange-600">Next</button>
            </div>
        </div>

        <!-- <button class="block h-12 mx-auto mt-8 mb-8 border w-44 border-grey2 rounded-2xl bg-orangeaccent" id="sub">Submit</button> -->
    </main>

    <?php view('partials/footer.view.php'); ?>

    <!-- SEND TEST RESULT TO PHP: -->
    <script>
        let id = <?php echo json_encode($currentUser); ?>;
    </script>
    <script src="assets/js/test.js"></script>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>