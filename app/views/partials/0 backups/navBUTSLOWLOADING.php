<!-- mobile nav -->
<header class="fixed flex z-50 bg-white1 w-full min-w-[320px] top-0 min-h-10 font-satoshimed" id="nav">
    <a class="ml-2 mx-auto p-2" id="burgButt"><img class="w-6 h-auto" src="assets/images/vectors/icons/table.png"></a>
    <a href="/" class="mx-auto p-2"><img class="w-6 h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png"></a>
    <a class="mr-2 mx-auto p-2" id="profButt">tao</a>

    <!-- burger dropdown -->
    <ul id="burgDD" class="hidden z-50 bg-gradient-to-b from-white1 to-grey1 fixed z-50 block w-full h-full font-satoshimed top-10 text-center">
    
        <div class="relative w-full h-fit top-10 mt-10">
            <a href="/" class="py-2 w-screen"><li class="py-6 text-2xl font-clashbold text-black1 w-auto h-fit">Home</li></a>
            
            <a href="<?php if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['account_type'] == 'admin') {
                    echo '/admin';
                } else {
                    echo '/dashboard';
                }
            } else {
                echo '/login';
            } ?>" class="py-2 w-screen"><li class="py-6 text-2xl font-clashbold text-black1 w-auto h-fit">Dashboard</li></a>
            <a href="/about" class="py-2 w-screen"><li class="py-6 text-2xl font-clashbold text-black1 w-auto h-fit">About</li></a>
            <a href="/submit-ticket" class="py-2 w-screen"><li class="py-6 text-2xl font-clashbold text-black1 w-auto h-fit">Contact</li></a>
        </div>

        
        
    </ul>

    <!-- profile dropdown -->
    <ul id="profDD" class="hidden bg-gradient-to-b from-white1 to-grey1 fixed z-50 block w-full h-full font-satoshimed top-10">

        <div class="relative block top-1/3 transform -translate-y-1/2 pt-24">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="w-full h-fit text-left p-4 py-6">
                    <h1 class="px-2 text-3xl font-clashbold text-black1"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></h1>
                    <h1 class="px-2 text-2xl font-clashbold text-grey2 tracking-wider mb-6"><?= "{$_SESSION['user']['school_id']}" ?></h1>
                    
                    <?php if ($_SESSION['user']['result'] ?? true ):?>
                        <div class="flex h-12">
                            <h1 class="relative top-0 py-4 px-0 font-satoshimed text-center mx-auto mr-0 text-xl text-grey2">RESULTS:</h1>
                            <h1 class="relative top-0 py-2 px-0 font-clashbold text-center mx-auto ml-0 text-3xl text-black1"><?= "{$_SESSION['user']['result']}" ?></h1>
                        </div>
                    <?php else:?>
                        <h1 class="text-center font-satoshimed text-2xl text-grey2 tracking-wide">take test to see result</h1>
                        
                    <?php endif;?>

                    <a href="/account"><h1 class="relative text-center left-1/2 transform -translate-x-1/2 text-black1 mt-6 tracking-tight bg-blue3 text-white1 w-3/4 p-2 border rounded-sm text-xs md:text-lg md:w-1/2">Account Settings</h1></a>

                    <form method="POST" action="/login">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="relative text-center left-1/2 transform -translate-x-1/2 text-black1 mt-6 tracking-tight bg-red1 text-white1 w-3/4 p-2 border rounded-sm text-xs md:text-lg md:w-1/2">Log Out</button>
                    </form>
                </div>
                

            <?php else: ?>
                <a href="/login"><h1 class="relative font-clashbold text-center left-1/2 transform -translate-x-1/2 text-black1 mt-32 tracking-tight bg-blue3 text-white1 w-3/4 p-2 py-4 rounded-xl border border-blue3 rounded-sm text-sm md:text-lg md:w-1/2">Sign in</h1></a>

                <a href="/register"><h1 class="relative font-clashbold text-center left-1/2 transform -translate-x-1/2 text-black1 mt-6 tracking-tight bg-orange1 text-black1 w-3/4 p-2 py-4 rounded-xl border border-orange1 rounded-sm text-sm md:text-lg md:w-1/2">Sign up</h1></a>
            <?php endif; ?>
        </div> 
        
    </ul>
</header>

<!-- desktop nav -->
<header class="fixed block bg-white1 z-50 shadow-md h-20 w-full content-center top-0" id="navbar">
    <!-- object container -->
    <div class="flex h-fit w-full justify-between font-satoshiblack text-xl text-black1 mx-auto px-[1rem]">
        <!-- Main NavBar -->
        <nav class="relative flex w-1/2 h-14 gap-14 ">
            <a href="/">
                <img class="w-0 h-0 max-h-14 max-w-14 sm:w-14 sm:h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png" alt="Zealia Logo"/>
            </a>

            <!-- text options -->
            <ul class="relative flex my-auto w-2/3">
                <li class="mx-auto">
                    <a href="/" class="p-2">Home</a>
                </li>
                
                <li class="mx-auto">
                    <a href="<?php if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['account_type'] == 'admin') {
                            echo '/admin';
                        } else {
                            echo '/dashboard';
                        }
                    } else {
                        echo '/login';
                    } ?>" class="p-2">Dashboard</a>
                </li>

                <li class="mx-auto">
                    <a href="/about" class="p-2">About</a>
                </li>
                <li class="mx-auto">
                    <a href="/submit-ticket" class="p-2">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- LOGIN & SIGNUP Part -->
        <div class="relative flex gap-[1.44rem] items-center">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <!-- NOTIFICATIONS -->
                <div id="notifContainer" class="relative inline-block">
                    <button id="notificationBtn" class="relative cursor-pointer">
                        <span class="notification-icon">🔔</span>
                        <span id="notificationCount" class="absolute -top-[8px] -right-[8px] bg-red1 text-white text-sm rounded py-1 px-2"></span>
                    </button>
                    <div id="notificationDropdown" class="absolute right-0 top-full max-h-[400px] w-[300px] bg-white1 border border-black1 rounded-lg shadow overflow-y-auto">
                        <div class="bg-black1 h-14 px-4 flex items-center">
                            <span class="font-satoshimed text-2xl text-orange1 ">Notifications</span>
                        </div>
                        <!-- <div class="bg-black1 h-[1px] my-2 w-64"></div> -->
                        <ol id="notificationList" class="flex flex-col">

                        </ol>
                    </div>
                </div>

                <div class="relative text-xl">
                    <button class="z-50 flex justify-between items-center px-4 h-12 w-56  bg-blue3 border rounded-lg" id="navDDbutton">
                        <span class="text-white1 w-4/5 text-left truncate"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></span>
                        <div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[12px] border-white1"></div>
                    </button>
                    <!-- TEMPO -->

                    <div class="z-40 hidden absolute flex-col justify-evenly bg-white1 h-[6.5rem] w-56 top-[2.375rem] px-2 border-2 rounded-b-2xl" id="navDropDown">
                        <a href="<?php if($_SESSION['user']['account_type'] === 'admin'):?>/admin-settings<?php else: ?>/account<?php endif; ?>">
                            <span class="">Account Settings</span>
                        </a>

                        <div class="w-52 h-[1.5px] bg-black1"></div>

                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="text-red1">Log Out</button>
                        </form>
                    </div>

                    <!-- <label class="">                          
                        <ul class="">
                            <a href="/account">
                                <li class="">
                                    <span class="">Account Settings</span>
                                </li>
                            </a>
                            <li class=""></li>
                            <li class="">
                                <form method="POST" action="/login">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="text-red1">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </label> -->
                </div>

            <?php else: ?>
                <a href="/login" class="bg-blue3 rounded-lg h-10 w-[6.25rem] flex justify-center items-center">
                    <span class="text-white">Sign In</span>
                </a>

                <a href="/register" class="bg-orange1 rounded-lg h-10 w-[6.25rem] flex justify-center items-center">
                    <span class="text-offBlack">Sign Up</span>
                </a>
            <?php endif; ?>
        </div> 
    </div>
</header>


<script>

    const nav1 = document.getElementById('nav');
    const nav2 = document.getElementById('navbar');
    const navDesk = document.getElementById('navbar');
    const burger = document.getElementById('burgButt');
    const profile = document.getElementById('profButt');
    const burgDD = document.getElementById('burgDD');
    const profDD = document.getElementById('profDD');

    const att = document.createAttribute("onresize"); //adds onresize="changeNav()" to the body
    // Set a value of the class attribute
    att.value = "changeNav()";
    // Add the class attribute to the first h1;
    document.getElementsByTagName("body")[0].setAttributeNode(att);

    function chooseNav(){
        if (window.innerWidth >= 1024){
            nav = nav2
            nav1.classList.add("hidden");
        }else{
            nav = nav1
            nav2.classList.add("hidden");
        }
    }

    function changeNav(){
        if (window.innerWidth >= 1024){
            nav = nav2
            nav1.classList.add("hidden");
            nav2.classList.remove("hidden");
        }else{
            nav = nav1
            nav2.classList.add("hidden");
            nav1.classList.remove("hidden");
        }
    }

    chooseNav();

    burger.addEventListener('click', function() {
        if (profDD.classList.contains("hidden")){ // closes other (profDD) if its open on burger press
            burgDD.classList.toggle('hidden');
        }else{
            profDD.classList.toggle('hidden');
            burgDD.classList.toggle('hidden');
        }
    });

    profile.addEventListener('click', function() {
        if (burgDD.classList.contains("hidden")){
            profDD.classList.toggle('hidden');
        }else{
            burgDD.classList.toggle('hidden');
            profDD.classList.toggle('hidden');
        }
    });

    // keep track of previous scroll position
    let prevScrollPos = window.pageYOffset;

    window.addEventListener('scroll', function() {
    // current scroll position
    const currentScrollPos = window.pageYOffset;

    if(prevScrollPos < currentScrollPos && currentScrollPos > 40){
        // user has scrolled up
        nav.classList.add('hidden')
    }else if(prevScrollPos > currentScrollPos) {
        // user has scrolled down
        nav.classList.remove('hidden')
    }

    // update previous scroll position
    prevScrollPos = currentScrollPos;
    });

</script>

<!-- FOR NOTIFICATIONS -->
<?php if ($_SESSION['user'] ?? false) : ?>
<script>
    // Load initial notifications immediately via AJAX
    async function loadInitialNotifications() {
        try {
            const response = await fetch('/notifications/initial');
            const data = await response.json();
            updateNotificationUI(data, true);
        } catch (error) {
            console.error('Error loading initial notifications:', error);
        }
    }

    // Initialize SSE connection with lazy loading
    let eventSource = null;

    function initializeSSE() {
        if (eventSource) return;

        eventSource = new EventSource('/notifications/stream', { 
            withCredentials: true 
        });

        let isConnected = false;
        let reconnectAttempts = 0;
        const MAX_RECONNECT_ATTEMPTS = 5;

        eventSource.onopen = function() {
            console.log('SSE Connection established');
            isConnected = true;
            reconnectAttempts = 0;
        };

        eventSource.addEventListener('notifications', function(event) {
            try {
                const data = JSON.parse(event.data);
                // Only update with new notifications, don't clear existing ones
                updateNotificationUI(data, false);
            } catch (error) {
                console.error('Error processing notification:', error);
            }
        });

        eventSource.onerror = function(error) {
            console.error('EventSource error:', error);
            isConnected = false;
            
            if (reconnectAttempts >= MAX_RECONNECT_ATTEMPTS) {
                console.error('Max reconnection attempts reached. Closing connection.');
                eventSource.close();
                eventSource = null;
                return;
            }
            
            reconnectAttempts++;
            
            setTimeout(() => {
                if (!isConnected && !eventSource) {
                    console.log(`Attempting to reconnect (${reconnectAttempts}/${MAX_RECONNECT_ATTEMPTS})...`);
                    initializeSSE();
                }
            }, 5000);
        };
    }

    function updateNotificationUI(data, isInitialLoad) {
        const notificationList = document.getElementById("notificationList");
        const notificationCount = document.getElementById("notificationCount");
        notificationCount.innerHTML = data.notRead.length;

        if (!notificationList) return;

        // Only clear the list on initial load
        if (isInitialLoad) {
            notificationList.innerHTML = '';
            
            // Add unread notifications first
            data.notRead.forEach(notification => {
                const notificationElement = createNotificationElement(notification, false);
                notificationList.appendChild(notificationElement);
            });

            // Then add read notifications
            data.hadRead.forEach(notification => {
                const notificationElement = createNotificationElement(notification, true);
                notificationList.appendChild(notificationElement);
            });
        } else {
            // For SSE updates, only add new unread notifications if they don't exist
            data.notRead.forEach(notification => {
                const existingNotification = document.querySelector(`[data-notification-id="${notification.id}"]`);
                if (!existingNotification) {
                    const notificationElement = createNotificationElement(notification, false);
                    notificationList.insertBefore(notificationElement, notificationList.firstChild);
                }
            });
        }

    }

    function createNotificationElement(notification, isRead) {
        const li = document.createElement('li');
        li.className = isRead ? 'read border border-t-[1px]' : 'w-full flex flex-col p-2 bg-white2 unread border-black1 border-t-[2px] text-base';
        li.dataset.notificationId = notification.id;

        let notifObj = JSON.parse(notification.type);

        // LIST OF NOTIFICATIONS
        switch (notification.type) {
            case "room_join":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "room_accept":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "room_decline":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "room_invite":
                li.innerHTML = `
                    <span class="text-base text-black1"><span>
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "student_remove":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "room_change":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "room_delete":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "change_student_role":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "change_student_group":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
            case "created_groups":
                li.innerHTML = `
                    ${notification.type}
                    <span class="timestamp text-sm text-grey2">${new Date(notification.created_at).toLocaleString()}</span>
                `;
                break;
        }
        return li;
    }

    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadInitialNotifications();
        
        // Start SSE connection after a short delay
        setTimeout(() => {
            initializeSSE();
        }, 1000);
    });

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        if (eventSource) {
            eventSource.close();
            eventSource = null;
        }
    });
    // let eventSource = new EventSource("/notifications/stream");

    // // Event when receiving a message from the server
    // eventSource.onmessage = function(event) {
    //     const data = JSON.parse(event.data)
    //     console.log(event.data);
    //     // Append the message to the ordered list
    //     document.getElementById("notificationList").innerHTML += '<li>'+data + "</li>";
    //     console.log(data);
    // };

    // eventSource.onerror = function(error) {
    //     console.error('EventSource failed:', error);
    //     eventSource.close();
    // };
</script>
<?php endif; ?>
<!-- 
<script>
    function connectEventSource() {
        let eventSource = new EventSource("/notifications/stream");

        eventSource.onmessage = function(event) {
            const data = JSON.parse(event.data);
            const notificationList = document.getElementById("notificationList");
            
            // Handle unread notifications
            data.notRead.forEach(notification => {
                notificationList.innerHTML += `<li class="unread">${notification.message}</li>`;
            });

            // Handle read notifications
            data.hadRead.forEach(notification => {
                notificationList.innerHTML += `<li class="read">${notification.message}</li>`;
            });
        };

        eventSource.onerror = function(error) {
            console.error("EventSource failed:", error);
            eventSource.close();
            // Attempt to reconnect after 5 seconds
            setTimeout(connectEventSource, 5000);
        };
    }

    // Initial connection
    connectEventSource();
</script> -->