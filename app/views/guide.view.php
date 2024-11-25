<?php view('partials/head.view.php'); ?>

<body class="relative block overflow-x-hidden overflow-y-scroll bg-white">
    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>

    <div class="relative block w-5/6 h-auto py-4 mx-auto top-32">
        <!-- HEADER -->
        <div class="w-full pb-4 mx-auto mb-6 text-center border-b border-black">
            <h1 class="text-2xl tracking-wider font-clashsemibold">HOW TO USE THE SITE?</h1>
            <h1 class="text-lg tracking-wider font-clashreg text-grey2">Here's a guide on our website's features</h1>
        </div>

        <!-- BODY -->
        <div class="flex w-full h-auto mx-auto">

            <!-- LEFT: TABLE OF CONTENTS -->
            <div class="block w-1/4 h-auto py-4 pl-8 mx-auto text-left">
                <h1 class="mb-4 text-lg font-clashsemibold text-blackhead">Table of Contents</h1>
                <a onclick="show('accTab','block');hideAll('accTab');" class="block w-full my-2 ml-8 text-xl cursor-pointer accTab focus:text-green1 text-grey2 hover:text-blacksec font-clashmed">Accounts</a>
                <a onclick="show('roomTab','block');hideAll('roomTab');" class="block w-full my-2 ml-8 text-xl cursor-pointer roomTab focus:text-green1 text-grey2 hover:text-blacksec font-clashmed">Rooms</a>
            </div>

            <!-- RIGHT: MAIN -->
            <div id="noSel" class="block w-3/4 h-auto mx-auto text-center">
                <h1 class="w-full h-full border border-black">*PICTURE* CHOOSE ONE FROM HERE NA NAKATURO SA LEFT, MAG HIHIDE KAPAG NAG PUMILI NA NG TAB</h1>
            </div>

            <!-- ACCOUNTS -->
            <div id="accTab" class="hidden w-3/4 h-auto py-4 pl-8">
                    
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">How can I create my account?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0">
                    <p class="my-2">
                        Click on Sign up, fill up the form, and wait for the activation link that will be sent to your email address.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Accounts/register.png" alt="register">
                </div>

                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">How do I change my password?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        You can change your password on the account settings page by filling up the form and saving changes.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Accounts/password.png" alt="password">
                </div>

                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Where do I take the test?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        On the account settings page, you can press the "take the test" button.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Accounts/test.png" alt="test">
                </div>

                
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Where do I see my test results</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        If you already took the test, you can see your test results on the account settings page.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Accounts/results.png" alt="results">
                </div>

                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Can I retake the test?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        Yes, you can retake the test on your account settings.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Accounts/retake.png" alt="retake">
                </div>

            </div>

            <!-- ROOMS -->
            <div id="roomTab" class="hidden w-3/4 h-auto py-4 pl-8">
                    
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">How do I join rooms?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        To join rooms, you have to ask your instructor for the room code and input the code in your Zealia dashboard and click join and wait for your instructor to accept your join request.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Rooms/rooms.png" alt="rooms">
                </div>

                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">I entered my code but I still can't join the room</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        After entering your code in the Zealia dashboard, you still have to wait for the instructor to accept your join request. 
                    </p>
                </div>

                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Why am I not able to join a group?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0">
                    <p class="my-2">
                        If you're not able to join a group even after asking your instructor to regenerate the groups, make sure you have taken the test and try again.
                    </p>
                </div>

                
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Can I change groups?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        If you want to change groups, you have to ask your instructor to change your group.
                    </p>
                </div>

                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Can I change roles?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        Roles are changeable, inform your instructor about the change and ask them to edit your role in their room group settings.
                    </p>
                </div>
                
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">How do I add tasks to the Kanban board?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        On your dashboard, enter the room containing the group you want to add a task to, click your Kanban board tab on the left, and click the Add button and fill up the form about the details of your task.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Rooms/tasks.png" alt="task">
                </div>
                
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">How do I change a tasks status to done?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        When a task is done, you can change it's status by dragging the task and dropping it to the done zone.
                    </p>
                    
                    <img class="my-2" src="assets/images/Guides/Rooms/status.png" alt="status">
                </div>
                
                <button class="mt-8 text-xl tracking-wide ques font-clashsemibold">Can I add tasks to my groupmates' Kanban board?</button>
                <div class="py-0 pl-8 pr-8 overflow-hidden text-lg text-left duration-700 ease-in bg-whitecon rounded-2xl panel font-clashreg max-h-0"> 
                    <p class="my-2">
                        Only the Principal Investigator can add tasks to other members' Kanban, meanwhile members can see other members' Kanban
                    </p>
                </div>

            </div>

        </div>
    </div>

    <script src="assets/js/shared-scripts.js"></script>
    <script>

        // hide script
        function hideAll(exception) {
            const ids = ['noSel', 'accTab', 'roomTab'];

            // Filter out the current ID from the array
            const filteredIds = ids.filter(id => id !== exception);

            // Hide the elements with the filtered IDs
            filteredIds.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                element.classList.add('hidden');
                element.classList.remove('block');
                } else {
                console.warn(`Element with ID ${id} not found.`);
                }
            });
        }

                

        // accordion script
        let isScrolling = false;
        let lastHovered;
        let scrollTimeout;

        window.addEventListener('scroll', function(){    
            isScrolling = true;
            clearTimeout(scrollTimeout);
            console.log(isScrolling);
        
            scrollTimeout = setTimeout(function(){
                isScrolling = false;
                console.log(isScrolling);
                window.addEventListener('mousemove', function(event) {
                    if(lastHovered && !isClicked){
                        console.log("lastHovered:",lastHovered);
                        closePanel(lastHovered); 
                        lastHovered = null;
                    }
                },{ once: true});
            }, 500);
        })
        
        const accordions = document.querySelectorAll('.ques');
        
        accordions.forEach(accordion => { 
            let isClicked = false; // Flag to track click state 

            // Toggle panel on click 
            accordion.addEventListener('click', function() { 
                isClicked = !isClicked; // Toggle the click state 
                console.log("clicked:", this);
                if (isClicked == false){
                    togglePanel(this); 
                }
            }); 

            // Open panel on hover 
            accordion.addEventListener('mouseover', function() {
                console.log("mouseover:", this);
                lastHovered = this;
                openPanel(this); 
            }); 
        
            // Close panel when hover ends, only if not clicked 
            
            accordion.addEventListener('mouseout', function() {
                console.log("mouseout:", this); 
                if (isClicked == false) { // Only close on hover end if not clicked 
                    closePanel(this); 
                } 
            }); 
        }); 
    
        function togglePanel(element) { 
            element.classList.toggle('active'); 

            const panel = element.nextElementSibling; 

            if (panel.style.maxHeight) { 
                panel.style.maxHeight = null; 
            } else { 
                panel.style.maxHeight = panel.scrollHeight + "px"; 
            } 
        } 
    
        function openPanel(element) { 
            const panel = element.nextElementSibling;
            element.classList.add('active'); 
            panel.style.maxHeight = panel.scrollHeight + "px";
        } 
    
        function closePanel(element) { 
            if (!isScrolling){
                const panel = element.nextElementSibling; 
                element.classList.remove('active'); 
                panel.style.maxHeight = null;
            }
        }
        // end of accordion script
        
    </script>
</body>

</html>