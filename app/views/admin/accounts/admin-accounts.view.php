<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative flex w-full h-32 py-12">
        <h1 class="mx-auto font-synebold ml-6 text-3xl">Account List</h1>
        <div class="flex mx-auto w-64 font-synemed text-lg">
            <button class="mx-auto border border-black rounded-lg p-auto w-28 text-center bg-blue2 hover:bg-blue3 hover:text-white1">Students</button>
            <button class="mx-auto border border-black rounded-lg p-auto w-28 text-center bg-blue2 hover:bg-blue3 hover:text-white1">Instructors</button>
        </div>
        <div class="flex mx-auto w-fit">
            <input type="text" class="border border-black rounded-lg mx-auto bg-white2">
            <button class="mx-auto border border-grey2 rounded-lg bg-orange1 w-28 ml-4">Search</button>
        </div>
    </div>

</body>