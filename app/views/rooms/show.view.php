<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>
    <main class="flex flex-col h-[50rem] w-[87.5rem] mt-20">
        <div id="roomName" class="flex justify-between items-center h-8 my-6">
            <div class="max-w-[64rem] truncate">
                <span class="font-synebold text-3xl text-black1 mr-1">Room Name that the instructor gave crazy newjeans ditto lalala young posse</span>
            </div>
            
            <button class="h-10 w-10 flex justify-center items-center rounded mr-2 border border-black1" onClick="show('changeRoomNameInput'); hide('roomName');">
                <img class="h-8 w-8" src="assets/images/icons/settings.png">
            </button>
        </div>

        <div id="changeRoomNameInput" class="hidden h-12 flex items-center justify-between my-6">
            <div class="w-[40rem] flex justify-evenly items-center ">
                <button class="bg-grey2 h-8 w-12 rounded" onClick="show('roomName'); hide('changeRoomNameInput');"></button>

                <form action="" class="flex w-[33rem] justify-between items-center">
                    <input class="h-10 w-96 border border-black1 rounded-lg px-4" placeholder="Change room name: Room Name">
                    <button class="bg-orange1 h-8 font-synemed border border-black1 rounded p-1" type="submit">Confirm Change</button>
                </form>
            </div>

            <button onClick="show('delRoomConfirmation');" class="bg-red1 h-8 p-2 flex items-center font-synereg text-white1 text-center border border-black1 rounded">Delete Room</button>
        </div>

        <div id="delRoomConfirmation" class="hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
            <div class="bg-white2 flex flex-col h-48 w-80 border border-black1 rounded-t-lg">
                <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                    <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Confirmation</span>
                    <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('delRoomConfirmation'); enableScroll();">X</button>
                </div>
                <div class="flex flex-col items-center h-64 p-2">
                    <span class="font-synebold text-red1 text-2xl">Delete:</span>
                    <span class="font-synemed text-xl">Room name</span>
                    <span class="font-synereg text-lg">FOREVER?</span>
                    <button class="bg-red1 p-1 mt-2 text-white1 border border-black1 rounded">Delete Room Forever</button>
                </div>
            </div>
        </div>

        <div class="flex justify-between">
            <!-- Class List & Requests -->
           <div class="h-[37.5rem] w-[18.75rem] border border-black1 rounded-xl">
                <!-- Tabs -->
                <div class="flex">
                    <button onClick="show('roomStudentList'); hide('roomJoinRequest');" class="bg-blue3 h-[2.81rem] w-[9.37rem] font-synereg text-white1 border border-black1 rounded-tl-xl">Students</button>
                    <button onClick="show('roomJoinRequest'); hide('roomStudentList');" class="bg-blue2 h-[2.81rem] w-[9.37rem] font-synereg text-black1 border border-black1 rounded-tr-xl">Join Requests</button>
                </div>

                <!-- List -->
                <div id="roomStudentList" class="h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <div class="flex justify-between h-[3.75rem] w-full bg-blue1 border border-black1 p-4">
                        <a href="#" class="text-base font-synereg">Surname, First Name</a>

                        <img src="assets/images/icons/cross.png" class="h-6 w-6 cursor-pointer" onClick="show('kickConfirmation'); disableScroll();">
                    </div>
                </div>
                

                <div id="kickConfirmation" class="hidden bg-glassmorphism fixed top-20 left-0  h-screen w-screen pt-56 justify-center">
                    <div class="bg-white2 flex flex-col h-40 w-80 border border-black1 rounded-t-lg">
                        <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                            <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Confirmation</span>
                            <button class="bg-red1 h-full w-1/5 rounded" onClick="hide('kickConfirmation'); enableScroll();">X</button>
                        </div>
                        <div class="flex flex-col items-center h-60 p-2">
                            <span class="font-synebold text-red1 text-2xl">Remove:</span>
                            <span class="font-synemed text-xl">Surname, First Name</span>
                            <span class="font-synereg text-lg">from this room?</span>
                            <button class="bg-red1 w-12 text-white1 border border-black1 rounded">Kick</button>
                        </div>
                    </div>
                </div>

                <!-- Requests -->
                <div id="roomJoinRequest" class="hidden h-[34.5rem] overflow-y-auto overflow-x-hidden rounded-b-xl">
                    <div class="flex justify-between items-center h-20 w-full px-2 bg-blue1 border border-black1">
                        <div class="w-52 flex flex-col">
                            <a href="#" class="font-synereg text-base">Surname, First Name</a>
                            <a href="#" class="font-synereg text-sm text-grey2">0123456789</a>
                            <a href="#" class="truncate">
                                <span class="font-synereg text-sm text-grey2">studentsemail@student.fatima.edu.ph</span>
                            </a>
                        </div>

                        <div class="flex h-6 w-16 justify-evenly">
                            <img src="assets/images/icons/check.png" class="h-6 w-6 cursor-pointer">
                            <img src="assets/images/icons/cross.png" class="h-6 w-6 cursor-pointer">
                        </div>
                    </div>
                    
                </div>
           </div>

           <!-- Groups Area -->
           <div class="bg-white2 h-[37.5rem] w-[67.5rem] border border-black1 rounded-xl flex justify-center items-center">
                <!-- Has Groups -->
                <div class=" h-full w-full flex flex-col items-center overflow-y-auto">
                    <div class="h-20 w-full flex items-center justify-between p-6">
                        <span class="w-4/5 font-synebold text-4xl flex">GROUPS</span>
                        <button class="bg-blue2 h-10 w-36 font-synereg text-lg border border-black1 rounded-lg">Edit Groups</button>
                    </div>

                    
                    <!-- Groups Container -->
                    <div class="h-auto w-full flex flex-wrap gap-y-5 justify-evenly p-6">
                        <!-- Each Boxes -->
                        <div class="bg-white1 h-auto max-h-[30rem] min-w-[20rem] max-w-[20rem] border border-black1 rounded-lg flex flex-col overflow-hidden">
                            <!-- Group Head -->
                            <div class="bg-orange1 h-10 w-full flex justify-center items-center ">
                                <span class="font-synemed text-black1 text-4xl">Group 1:</span>
                            </div>
  
                            <!-- Group Body -->
                            <div class="max-h-[24.9125rem] w-full">
                                <!-- Each Member -->
                                <div class="h-[6.22875rem] w-full flex">
                                    <span class="w-6/12  border border-black1 flex items-center break-all p-1 font-synereg">Surname Firstwqewqewqewqewqewq</span>
                                    <span class="w-6/12  border border-black1 flex justify-center items-center p-1 font-synemed text-2xl text-blue3">Leader</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NO GROUPS -->
                <!-- <div class="flex flex-col items-center">
                    <span class="font-synebold text-4xl">You haven't grouped the class yet.</span>
                    <button class="bg-orange1 h-[3.13rem] w-[12.5rem] font-synebold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                </div> -->
            </div>
        </div>
    </main>
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>