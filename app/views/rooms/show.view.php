<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col justify-between items-center">
    <?php view('partials/nav.view.php')?>
    <main class="flex flex-col h-[50rem] w-[87.5rem] mt-20">
        <div id="roomName" class="flex h-8 my-6">
            <div class="max-w-[64rem] truncate">
                <span class="font-synebold text-3xl text-black1 mr-1">Room Name that the instructor gave crazy newjeans ditto lalala young posse</span>
            </div>
            
            <button class="h-4 w-4 rounded bg-grey2" onClick="show('changeRoomNameInput'); hide('roomName');"></button>
        </div>

        <div id="changeRoomNameInput" class="hidden h-12 w-[40rem] my-6 justify-evenly items-center">
            <button class="bg-red1 h-8 w-12 rounded" onClick="show('roomName'); hide('changeRoomNameInput');"></button>

            <form class="flex w-[33rem] justify-between items-center">
                <input class="h-12 w-96 border border-black1 rounded-lg px-4" placeholder="Change room name: Room Name">
                <button class="bg-orange1 h-8 font-synemed border border-black1 rounded p-1" type="submit">Confirm Change</button>
            </form>
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
                    <a href="#" class="flex justify-between h-[3.75rem] w-full bg-blue1 border border-black1 p-4">
                        <span class="text-base font-synereg">Surname, First Name</span>

                        <button class="h-6 w-6 bg-red1 rounded" onClick="show('');"></button>
                    </a>
                </div>

                <div id="kickConfirmation" class="relative h-screen w-screen">
                    <div class="bg-white2 absolute top-80 flex flex-col h-40 w-80 border border-black1 rounded-t-lg">
                        <div class="bg-blue3 flex justify-between items-center h-20 border border-black1 rounded-t-lg">
                            <span class="text-white1 w-4/5 text-lg font-synemed pl-2">Confirmation</span>
                            <button class="bg-red1 h-full w-1/5 rounded">X</button>
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
                    <a href="#" class="flex justify-between items-center h-20 w-full px-2 bg-blue1 border border-black1">
                        <div class="w-52 flex flex-col">
                            <span class="font-synereg text-base">Surname, First Name</span>
                            <span class="font-synereg text-sm text-grey2">0123456789</span>
                            <div class="truncate">
                                <span class="font-synereg text-sm text-grey2">studentsemail@student.fatima.edu.ph</span>
                            </div>
                        </div>

                        <div class="flex h-6 w-16 justify-evenly">
                            <button class="h-6 w-6 bg-green1 rounded"></button>
                            <button class="h-6 w-6 bg-red1 rounded"></button>
                        </div>
                    </a>
                    
                </div>
           </div>

           <!-- Groups Area -->
           <div class="h-[37.5rem] w-[67.5rem] border border-black1 rounded-xl flex justify-center items-center">
                <div class="flex flex-col items-center">
                    <span class="font-synebold text-4xl">You haven't grouped the class yet.</span>
                    <button class="bg-orange1 h-[3.13rem] w-[12.5rem] font-synebold text-xl border border-black1 rounded-lg mt-4">Generate groups</button>
                </div>
            </div>
        </div>
    </main>
    <?php view('partials/footer.view.php')?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>