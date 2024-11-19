<?php view('partials/head.view.php'); ?>

<body class="relative block overflow-x-hidden overflow-y-scroll">
    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>

    <div class="relative block mx-auto top-32 py-4 w-5/6 h-auto">
        <!-- HEADER -->
        <div class="mx-auto text-center border-b border-black w-full pb-4 mb-6">
            <h1 class="font-clashsemibold text-2xl tracking-wider">HOW TO USE THE SITE?</h1>
            <h1 class="font-clashreg text-lg text-grey2 tracking-wider">Here's a guide on our website's features</h1>
        </div>

        <!-- BODY -->
        <div class="flex mx-auto w-full h-auto">

            <!-- LEFT: TABLE OF CONTENTS -->
            <div class="block text-left mx-auto w-1/4 h-auto pl-8 py-4">
                <h1 class="font-clashsemibold text-blackhead text-lg mb-4">Table of Contents</h1>
                <a onclick="show('accTab','block');hideAll('accTab');" class="accTab block cursor-pointer w-full my-2 ml-8 focus:text-green1 text-grey2 hover:text-blacksec font-clashmed text-xl">Accounts</a>
                <a onclick="show('roomTab','block');hideAll('roomTab');" class="roomTab block cursor-pointer w-full my-2 ml-8 focus:text-green1 text-grey2 hover:text-blacksec font-clashmed text-xl">Rooms</a>
            </div>

            <!-- RIGHT: MAIN -->
            <div id="noSel" class="block mx-auto w-3/4 text-center h-auto">
                <h1 class="border border-black w-full h-full">*PICTURE* CHOOSE ONE FROM HERE NA NAKATURO SA LEFT, MAG HIHIDE KAPAG NAG PUMILI NA NG TAB</h1>
            </div>

            <!-- ACCOUNTS -->
            <div id="accTab" class="hidden pl-8 py-4 w-3/4 h-auto">
                    
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How can I create my account?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8">
                    <p>
                        Click on Sign up, fill up the form, and wait for the activation link that will be sent to your email address.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How do I change my password?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        You can change your password on the account settings page by filling up the form and saving changes.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Where do I take the test?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        On the account settings page, you can take or retake the test.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Where do I see my test results</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        If you already took the test, you can see your test results on the account settings page.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I retake the test?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        Yes, you can retake the test on your account settings.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

            </div>

            <!-- ROOMS -->
            <div id="roomTab" class="hidden pl-8 py-4 w-3/4 h-auto">
                    
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How do I join rooms?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        To join rooms, you have to ask your instructor for the room code and input the code in your Zealia dashboard and click join and wait for your instructor to accept your join request.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">I entered my code but I still can't join the room</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        After entering your code in the Zealia dashboard, you still have to wait for the instructor to accept your join request. 
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Why am I not able to join a group?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8">
                    <p>
                        If you're not able to join a group even after asking your instructor to regenerate the groups, make sure you have taken the test and try again.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I change groups?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        If you want to change groups, you have to ask your instructor to change your group.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I change roles?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        Roles are changeable, inform your instructor about the change and ask them to edit your role in their room group settings.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>
                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How do I add tasks to the Kanban board?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        On your dashboard, enter the room containing the group you want to add a task to, click your Kanban board tab on the left, and click the Add button and fill up the form about the details of your task.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>
                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How do I change a tasks status to done?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        When a task is done, you can change it's status by dragging the task and dropping it to the done zone.
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
                </div>
                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I add tasks to my groupmates' Kanban board?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-700 pr-8 ease-in bg-white py-0 pl-8"> 
                    <p>
                        Only the Principal Investigator can add tasks to other members' Kanban, meanwhile members can see other members' Kanban
                    </p>
                    
                    <img src="assets/images/john-holland.png" alt="John Holland">
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