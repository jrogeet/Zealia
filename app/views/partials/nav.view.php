<!-- mobile nav -->
<header class="fixed flex z-50 bg-white1 w-full min-w-[320px] top-0 min-h-10 font-synemed" id="nav">
    <a class="ml-2 mx-auto p-2" id="burgButt"><img class="w-6 h-auto" src="assets/images/vectors/icons/table.png"></a>
    <a href="/" class="mx-auto p-2"><img class="w-6 h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png"></a>
    <a class="mr-2 mx-auto p-2" id="profButt">tao</a>

    <!-- burger dropdown -->
    <ul id="burgDD" class="hidden z-50 bg-gradient-to-b from-white1 to-grey1 fixed z-50 block w-full h-full font-synemed top-10 text-center">
    
        <div class="relative w-full h-fit top-10 mt-10">
            <a href="/" class="py-2 w-screen"><li class="py-6 text-2xl font-synebold text-black1 w-auto h-fit">Home</li></a>
            
            <a href="<?php if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['account_type'] == 'admin') {
                    echo '/admin';
                } else {
                    echo '/dashboard';
                }
            } else {
                echo '/login';
            } ?>" class="py-2 w-screen"><li class="py-6 text-2xl font-synebold text-black1 w-auto h-fit">Dashboard</li></a>
            <a href="/about" class="py-2 w-screen"><li class="py-6 text-2xl font-synebold text-black1 w-auto h-fit">About</li></a>
            <a href="/submit-ticket" class="py-2 w-screen"><li class="py-6 text-2xl font-synebold text-black1 w-auto h-fit">Contact</li></a>
        </div>

        
        
    </ul>

    <!-- profile dropdown -->
    <ul id="profDD" class="hidden bg-gradient-to-b from-white1 to-grey1 fixed z-50 block w-full h-full font-synemed top-10">

        <div class="relative block top-1/3 transform -translate-y-1/2 pt-24">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="w-full h-fit text-left p-4 py-6">
                    <h1 class="px-2 text-3xl font-synebold text-black1"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></h1>
                    <h1 class="px-2 text-2xl font-synebold text-grey2 tracking-wider mb-6"><?= "{$_SESSION['user']['school_id']}" ?></h1>
                    
                    <?php if ($_SESSION['user']['result'] ?? true ):?>
                        <div class="flex h-12">
                            <h1 class="relative top-0 py-4 px-0 font-synemed text-center mx-auto mr-0 text-xl text-grey2">RESULTS:</h1>
                            <h1 class="relative top-0 py-2 px-0 font-synebold text-center mx-auto ml-0 text-3xl text-black1"><?= "{$_SESSION['user']['result']}" ?></h1>
                        </div>
                    <?php else:?>
                        <h1 class="text-center font-synemed text-2xl text-grey2 tracking-wide">take test to see result</h1>
                        
                    <?php endif;?>

                    <a href="/account"><h1 class="relative text-center left-1/2 transform -translate-x-1/2 text-black1 mt-6 tracking-tight bg-blue3 text-white1 w-3/4 p-2 border rounded-sm text-xs md:text-lg md:w-1/2">Account Settings</h1></a>

                    <form method="POST" action="/login">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="relative text-center left-1/2 transform -translate-x-1/2 text-black1 mt-6 tracking-tight bg-red1 text-white1 w-3/4 p-2 border rounded-sm text-xs md:text-lg md:w-1/2">Log Out</button>
                    </form>
                </div>
                

            <?php else: ?>
                <a href="/login"><h1 class="relative font-synebold text-center left-1/2 transform -translate-x-1/2 text-black1 mt-32 tracking-tight bg-blue3 text-white1 w-3/4 p-2 py-4 rounded-xl border border-blue3 rounded-sm text-sm md:text-lg md:w-1/2">Sign in</h1></a>

                <a href="/register"><h1 class="relative font-synebold text-center left-1/2 transform -translate-x-1/2 text-black1 mt-6 tracking-tight bg-orange1 text-black1 w-3/4 p-2 py-4 rounded-xl border border-orange1 rounded-sm text-sm md:text-lg md:w-1/2">Sign up</h1></a>
            <?php endif; ?>
        </div> 
        
    </ul>
</header>

<!-- desktop nav -->
<header class="fixed block bg-white1 z-50 shadow-md h-20 w-full content-center top-0" id="navbar">
    <!-- object container -->
    <div class="flex h-fit w-full justify-between font-synesemi text-xl text-black1 mx-auto px-[1rem]">
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
                            <span class="font-synemed text-2xl text-orange1 ">Notifications</span>
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

                        <div class="w-52 h-[1px] bg-black1"></div>

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
    const NotificationManager = {
        eventSource: null,
        notificationCount: document.getElementById("notificationCount"),
        notificationList: document.getElementById("notificationList"),
        isInitializing: false,
        webSocket: null,
        
        async init() {
            if (this.isInitializing) return;
            this.isInitializing = true;
            
            try {
                await this.loadInitialNotifications();
                this.initWebSocket();
            } catch (error) {
                console.error('Initialization error:', error);
                // Show user-friendly error message
                this.showError('Unable to load notifications. Please refresh the page.');
            } finally {
                this.isInitializing = false;
            }
        },
        
        async loadInitialNotifications() {
            try {
                const response = await fetch('/notifications/initial');
                
                // Check if response is ok
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                // Get the content type
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new TypeError("Expected JSON response but received " + contentType);
                }
                
                const data = await response.json();
                
                // Validate the response structure
                if (!this.isValidNotificationData(data)) {
                    throw new Error('Invalid notification data structure');
                }
                
                this.updateUI(data, true);
            } catch (error) {
                console.error('Error loading notifications:', error);
                throw new Error('Failed to load notifications: ' + error.message);
            }
        },
        
        initWebSocket() {
            const wsProtocol = window.location.protocol === 'https:' ? 'wss:' : 'ws:'
            const wsUrl = `${wsProtocol}//${window.location.host}:8080`
            
            this.webSocket = new WebSocket(wsUrl);

            this.webSocket.onopen = () => {
                console.log('WebSocket connection established');
            };

            this.webSocket.onmessage = (event) => {
                try {
                    const data = JSON.parse(event.data);
                    this.updateUI(data, false);
                } catch (error) {
                    console.error('Error processing WebSocket message:', error);
                }
            };

            this.webSocket.onclose = (event) => {
                console.log(`WebSocket connection closed. Code: ${event.code}, Reason: ${event.reason}`);
                this.showError('Connection to notification server lost. Attempting to reconnect...');
                setTimeout(() => this.initWebSocket(), 5000);
            };

            this.webSocket.onerror = (error) => {
                console.error('WebSocket error:', error);
                this.showError('Error connecting to notification server. Please check your connection.');
            };
        },
        
        isValidNotificationData(data) {
            return data 
                && Array.isArray(data.notRead)
                && Array.isArray(data.hadRead)
                && typeof data.timestamp === 'string';
        },
        
        showError(message) {
            // Add error message to the UI
            const errorDiv = document.createElement('div');
            errorDiv.className = 'notification-error bg-red-100 text-red-700 p-2 rounded-md mb-2';
            errorDiv.textContent = message;
            
            if (this.notificationList) {
                this.notificationList.insertBefore(errorDiv, this.notificationList.firstChild);
                
                // Remove error message after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            }
        },
        
        updateUI(data, isInitialLoad) {
            if (!this.notificationList) return;
            
            try {
                if (data.notRead?.length >= 0) {
                    this.notificationCount.textContent = data.notRead.length;
                }

                if (isInitialLoad) {
                    const fragment = document.createDocumentFragment();
                    
                    data.notRead.forEach(notification => {
                        fragment.appendChild(this.createNotificationElement(notification, false));
                    });
                    
                    data.hadRead.forEach(notification => {
                        fragment.appendChild(this.createNotificationElement(notification, true));
                    });
                    
                    this.notificationList.innerHTML = '';
                    this.notificationList.appendChild(fragment);
                } else {
                    const fragment = document.createDocumentFragment();
                    data.notRead.forEach(notification => {
                        if (!document.querySelector(`[data-notification-id="${notification.id}"]`)) {
                            fragment.insertBefore(
                                this.createNotificationElement(notification, false),
                                fragment.firstChild
                            );
                        }
                    });
                    this.notificationList.insertBefore(fragment, this.notificationList.firstChild);
                }

                // Handle deleted notifications
                if (data.deletedNotifications) {
                    data.deletedNotifications.forEach(id => {
                        const element = document.querySelector(`[data-notification-id="${id}"]`);
                        if (element) {
                            element.remove();
                        }
                    });
                }
            } catch (error) {
                console.error('Error updating UI:', error);
                this.showError('Error updating notifications.');
            }
        },
        
        createNotificationElement(notification, isRead) {
            try {
                const li = document.createElement('li');
                li.className = isRead 
                    ? 'read border border-t-[1px]' 
                    : 'w-full flex flex-col p-2 bg-white2 unread border-black1 border-t-[2px] text-base';
                li.dataset.notificationId = notification.id;
                
                // Safely handle notification type
                let type = notification.type;
                try {
                    const parsedType = JSON.parse(notification.type);
                    type = typeof parsedType === 'object' ? JSON.stringify(parsedType) : parsedType;
                } catch {
                    // If parsing fails, use the original type
                }
                
                li.innerHTML = `
                    ${type}
                    <span class="timestamp text-sm text-grey2">
                        ${new Date(notification.created_at).toLocaleString()}
                    </span>
                `;
                
                return li;
            } catch (error) {
                console.error('Error creating notification element:', error);
                return document.createElement('li'); // Return empty li to prevent crashes
            }
        },
        
        cleanup() {
            if (this.eventSource) {
                this.eventSource.close();
                this.eventSource = null;
            }
        }
    };

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        NotificationManager.init();
    });

    // Handle tab visibility
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            NotificationManager.cleanup();
        } else {
            NotificationManager.init();
        }
    });

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        NotificationManager.cleanup();
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