<?php view('partials/head.view.php'); ?>

<body class="relative overflow-hidden">
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
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How do I change my password?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Where do I take the test?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Where do I see my test results</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I retake the test?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I change my password?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

            </div>

            <!-- ROOMS -->
            <div id="roomTab" class="hidden pl-8 py-4 w-3/4 h-auto">
                    
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">How do I join rooms?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Why can't I join a group within my room?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Where do I take the test?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Where do I see my test results</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>

                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I retake the test?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                
                <button class="ques font-clashsemibold tracking-wide text-xl mt-8">Can I change my password?</button>
                <div class="panel font-clashreg text-lg text-left max-h-0 overflow-hidden duration-500 pr-8 ease-out bg-white py-0 pl-8"> 
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
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
        const accordions = document.querySelectorAll('.ques');
        
        accordions.forEach(accordion => { 
            let isClicked = false; // Flag to track click state 

            // Toggle panel on click 
            accordion.addEventListener('click', function() { 
                isClicked = !isClicked; // Toggle the click state 
                if (isClicked == false){
                    togglePanel(this); 
                }
            }); 

            // Open panel on hover 
            accordion.addEventListener('mouseover', function() { 
                openPanel(this); 
        }); 
        
        // Close panel when hover ends, only if not clicked 
        
        accordion.addEventListener('mouseout', function() { 
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
        const panel = element.nextElementSibling; element.classList.remove('active'); 
        panel.style.maxHeight = null;
    }
    // end of accordion script
        
    </script>
</body>

</html>