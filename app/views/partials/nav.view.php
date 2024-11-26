<!-- mobile nav -->
<header class="fixed flex z-50 bg-white w-full min-w-[320px] top-0 min-h-10 font-satoshimed" id="nav">
    <a class="p-2 mx-auto ml-2" id="burgButt"><img class="w-6 h-auto" src="assets/images/vectors/icons/table.png"></a>
    <a href="/" class="p-2 mx-auto"><img class="w-6 h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png"></a>
    <a class="p-2 mx-auto mr-2" id="profButt">tao</a>

    <!-- burger dropdown -->
    <ul id="burgDD" class="fixed z-50 hidden block w-full h-full text-center bg-gradient-to-b from-white to-grey1 font-satoshimed top-10">
    
        <div class="relative w-full mt-10 h-fit top-10">
            <a href="/" class="w-screen py-2"><li class="w-auto py-6 text-2xl font-satoshimed text-black1 h-fit">Home</li></a>
            
            <a href="<?php if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['account_type'] == 'admin') {
                    echo '/admin';
                } else {
                    echo '/dashboard';
                }
            } else {
                echo '/login';
            } ?>" class="w-screen py-2"><li class="w-auto py-6 text-2xl font-satoshimed text-black1 h-fit">Dashboard</li></a>
            <a href="/about" class="w-screen py-2"><li class="w-auto py-6 text-2xl font-satoshimed text-black1 h-fit">About</li></a>
            <a href="/submit-ticket" class="w-screen py-2"><li class="w-auto py-6 text-2xl font-satoshimed text-black1 h-fit">Contact</li></a>
        </div>

        
        
    </ul>

    <!-- profile dropdown -->
    <ul id="profDD" class="fixed z-50 hidden block w-full h-full bg-gradient-to-b from-white to-grey1 font-satoshimed top-10">

        <div class="relative block pt-24 transform -translate-y-1/2 top-1/3">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="w-full p-4 py-6 text-left h-fit">
                    <h1 class="px-2 text-3xl font-satoshimed text-black1"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></h1>
                    <h1 class="px-2 mb-6 text-2xl tracking-wider font-satoshimed text-grey2"><?= "{$_SESSION['user']['school_id']}" ?></h1>
                    
                    <?php if ($_SESSION['user']['result'] ?? true ):?>
                        <div class="flex h-12">
                            <h1 class="relative top-0 px-0 py-4 mx-auto mr-0 text-xl text-center font-satoshimed text-grey2">RESULTS:</h1>
                            <h1 class="relative top-0 px-0 py-2 mx-auto ml-0 text-3xl text-center font-satoshimed text-black1"><?= "{$_SESSION['user']['result']}" ?></h1>
                        </div>
                    <?php else:?>
                        <h1 class="text-2xl tracking-wide text-center font-satoshimed text-grey2">take test to see result</h1>
                        
                    <?php endif;?>

                    <a href="/account"><h1 class="relative w-3/4 p-2 mt-6 text-xs tracking-tight text-center text-white transform -translate-x-1/2 border rounded-sm left-1/2 text-black1 bg-blue3 md:text-lg md:w-1/2">Account Settings</h1></a>

                    <form method="POST" action="/login">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="relative w-3/4 p-2 mt-6 text-xs tracking-tight text-center text-white transform -translate-x-1/2 border rounded-sm left-1/2 text-black1 bg-rederr md:text-lg md:w-1/2">Log Out</button>
                    </form>
                </div>
                

            <?php else: ?>
                <a href="/login"><h1 class="relative w-3/4 p-2 py-4 mt-32 text-sm tracking-tight text-center text-white transform -translate-x-1/2 border rounded-sm font-satoshimed left-1/2 text-black1 bg-blue3 rounded-xl border-blue3 md:text-lg md:w-1/2">Sign in</h1></a>

                <a href="/register"><h1 class="relative w-3/4 p-2 py-4 mt-6 text-sm tracking-tight text-center transform -translate-x-1/2 border rounded-sm font-satoshimed left-1/2 text-black1 bg-orangeaccent rounded-xl border-orangeaccent md:text-lg md:w-1/2">Sign up</h1></a>
            <?php endif; ?>
        </div> 
        
    </ul>
</header>

<!-- desktop nav -->
<header class="fixed top-0 z-50 content-center block w-full h-20 bg-glassmorphism" id="navbar">
    <!-- object container -->
    <div class="flex h-fit w-full justify-between font-satoshimed text-xl text-black1 mx-auto px-[1rem]">
        <!-- Main NavBar -->
        <nav class="relative flex w-1/2 h-14 gap-14 ">
            <a href="/">
                <img class="w-0 h-0 max-h-14 max-w-14 sm:w-14 sm:h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png" alt="Zealia Logo"/>
            </a>

            <!-- text options -->
            <ul class="relative flex w-2/3 my-auto">
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
                    <a href="/guide" class="p-2">Guide</a>
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
                    <button id="notificationBtn" onclick="toggle('notificationDropdown')" class="relative cursor-pointer">
                        <span class="text-3xl notification-icon">🔔</span>
                        <span id="notificationCount" class="absolute -top-[2px] -right-[2px] bg-rederr text-white text-sm rounded-2xl py-[0.05rem] px-2"></span>
                    </button>
                    <div id="notificationDropdown" class="hidden flex-col absolute right-0 top-full max-h-[25rem] w-[20rem] bg-white border border-black1 rounded-lg shadow overflow-hidden">
                        <div class="flex items-center justify-between px-4 py-6 pr-6 bg-blackpri h-14">
                            <span class="text-2xl font-satoshimed text-blue2">Notifications</span>
                            <form action="/notifications" method="POST">
                                <button class="text-base text-white font-satoshimed hover:text-rederr" name="clear" type="submit">Clear</button>
                            </form>
                        </div>
                        <!-- <div class="bg-black1 h-[1px] my-2 w-64"></div> -->
                        <ol id="notificationList" class="flex flex-col overflow-y-auto">

                        </ol>
                    </div>
                </div>

                <div class="relative text-xl">
                    <button onclick="toggle('navDropDown')" class="z-50 flex items-center justify-between w-56 h-12 px-4 border rounded-lg bg-blue3" id="navDDbutton">
                        <span class="w-4/5 text-left text-white truncate"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></span>
                        <div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[12px] border-white"></div>
                    </button>
                    <!-- TEMPO -->

                    <div class="z-40 hidden absolute flex-col justify-evenly bg-white h-[6.5rem] w-56 top-[2.375rem] px-2 border-2 rounded-b-2xl" id="navDropDown">
                        <a href="<?php if($_SESSION['user']['account_type'] === 'admin'):?>/admin-settings<?php else: ?>/account<?php endif; ?>">
                            <span class="">Account Settings</span>
                        </a>

                        <div class="w-52 h-[1.5px] bg-black1"></div>

                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="text-rederr">Log Out</button>
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
                                    <button class="text-rederr">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </label> -->
                </div>

            <?php else: ?>
                <a href="/login" class="bg-blue3 rounded-lg h-10 w-[6.25rem] flex justify-center items-center">
                    <span class="text-white">Sign In</span>
                </a>

                <a href="/register" class="bg-orangeaccent rounded-lg h-10 w-[6.25rem] flex justify-center items-center">
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
    broadcastChannel: null,
    
    async init() {
        if (this.isInitializing) return;
        this.isInitializing = true;
        
        try {
            this.initBroadcastChannel();
            await this.loadInitialNotifications();
            this.initializeSSE();
        } catch (error) {
            console.error('Initialization error:', error);
            // Show user-friendly error message
            this.showError('Unable to load notifications. Please refresh the page.');
        } finally {
            this.isInitializing = false;
        }
    },

    initBroadcastChannel() {
        this.broadcastChannel = new BroadcastChannel('notifications_channel');
        this.broadcastChannel.onmessage = (event) => {
            if (event.data.type === 'notification_update') {
                this.updateUI(event.data.notifications, false);
            }
        };
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
    
    initializeSSE() {
        if (this.eventSource) {
            this.eventSource.close();
        }

        this.eventSource = new EventSource('/notifications/stream', { 
            withCredentials: true 
        });

        this.eventSource.addEventListener('notifications', event => {
            try {
                const data = JSON.parse(event.data);
                if (!this.isValidNotificationData(data)) {
                    throw new Error('Invalid notification data structure');
                }
                this.updateUI(data, false);
                // Broadcast the update to other tabs
                this.broadcastChannel.postMessage({
                    type: 'notification_update',
                    notifications: data
                });
            } catch (error) {
                console.error('Error processing notification:', error);
                this.showError('Error processing notification.');
            }
        });

        this.eventSource.addEventListener('error', event => {
            console.error('SSE Error:', event);
            this.cleanup();
            this.showError('Connection lost. Reconnecting...');
            setTimeout(() => this.init(), 5000);
        });
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
        } catch (error) {
            console.error('Error updating UI:', error);
            this.showError('Error updating notifications.');
        }
    },
    
    createNotificationElement(notification, isRead) {
        try {
            const li = document.createElement('li');
            li.className = isRead 
                ? 'w-full flex flex-col p-2 bg-white unread border-black1 border-t-[2px] text-base ' 
                : 'w-full flex flex-col p-2 bg-beige unread border-black1 border-t-[2px] text-base';
            li.dataset.notificationId = notification.id;

            // Safely handle notification type
            let type = notification.type;
            try {
                const parsedType = JSON.parse(notification.type);
                type = typeof parsedType === 'object' ? JSON.stringify(parsedType) : parsedType;
            } catch {
                // If parsing fails, use the original type
            }

            let jsonType = JSON.parse(type);
            let notifMessage



            switch (jsonType.type) {
                case "room_accept":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="w-full h-full font-satoshimed text-blackless">Your request to join <span class="font-satoshimed text-blackpri">${jsonType.room_name}</span> has been accepted.</a>`;
                    break;
                case "room_decline":
                    notifMessage = `<div class="font-satoshimed text-blackless">Your request to join <span class="font-satoshimed text-blackpri">${jsonType.room_name}</span> was declined.</div>`;
                    break;
                case "room_join":
                    notifMessage = `<div class="font-satoshimed text-blackless"><span class="italic text-blackpri font-satoshimed">${jsonType.student_name} </span>requested to join<span class="font-clashmed text-blackpri"> ${jsonType.room_name}</span></div>`;
                    break;
                case "created_groups":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-satoshimed text-blackless">Instructor <span class="italic font-satoshiblack">${jsonType.prof_name} </span>created groups in room:<span class="font-satoshimed text-blackpri"> ${jsonType.room_name}</span></a>`;
                    break;
                case "change_student_group":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-satoshimed text-blackless"><span class="italic font-satoshiblack text-blackpri">${jsonType.prof_name}</span> transferred you from group:<span class="italic"> (${jsonType.old_group})</span> into <span class="font-satoshimed text-blackpri">${jsonType.new_group}</span></a>`;
                    break;
                case "change_student_role":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-satoshimed text-blackless"><span class="italic font-satoshiblack text-blackpri">${jsonType.prof_name}</span> changed your role from:<span class="italic"> (${jsonType.old_role})</span> to <span class="font-satoshimed text-blackpri">${jsonType.new_role}</span></a>`;
                    break;
                case "room_delete":
                    notifMessage = `<div class="font-satoshimed text-blackless">The instructor deleted the room: <span class="font-satoshimed text-blackpri">${jsonType.room_name}</span></div>`;
                    break;
                case "room_change":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-satoshimed text-blackless"><span class="italic font-satoshiblack">${jsonType.prof_name}</span> changed room: <span class="italic"> (${jsonType.old_room_name})</span> 's name into <span class="font-satoshimed text-blackpri">${jsonType.new_room_name}</span></a>`;
                    break;
                case "student_remove":
                    notifMessage = `<div class="font-satoshimed text-blackless">You were removed from room: <span class="font-satoshimed text-blackpri">${jsonType.room_name}</span></div>`;
                    break;
                case "room_invite":
                    notifMessage = `
                    <form action="/notifications" method="POST" class="flex items-center justify-between text-blackless">
                        <input type="hidden" name="invite" value="${jsonType.room_id}">
                        <input type="hidden" name="notif_id" value="${notification.id}">
                        <div class="w-4/5 font-satoshimed">
                            <span class="italic font-satoshiblack">${jsonType.prof_name} </span>
                        invited you to join 
                            <span class="truncate font-satoshimed"> ${jsonType.room_name}</span>
                        </div>

                        <div class="flex justify-between w-1/5">
                            <button class="w-6 h-6 bg-cover cursor-pointer bg-check" type="submit"  name="accept" value="${jsonType.room_id}"> </button>
                            <button class="w-6 h-6 bg-cover cursor-pointer bg-cross" type="submit" name="decline" value="${jsonType.room_id}"> </button>
                        </div>
                    </form>
                    `;
                    break;
            }
                
            
            li.innerHTML = `
                ${notifMessage}
                <span class="flex justify-end w-full text-sm font-satoshimed text-blue3">
                    ${this.formatTimeAgo(new Date(notification.created_at))}
                </span>
            `;
            
            return li;
        } catch (error) {
            console.error('Error creating notification element:', error);
            return document.createElement('li'); // Return empty li to prevent crashes
        }
    },

    formatTimeAgo(date) {
        const now = new Date();
        const diffInSeconds = Math.floor((now - date) / 1000);
        const diffInMinutes = Math.floor(diffInSeconds / 60);
        const diffInHours = Math.floor(diffInMinutes / 60);
        const diffInDays = Math.floor(diffInHours / 24);

        if (diffInSeconds < 60) {
            return 'Just now';
        } else if (diffInMinutes < 60) {
            return `${diffInMinutes} minute${diffInMinutes > 1 ? 's' : ''} ago`;
        } else if (diffInHours < 24) {
            return `${diffInHours} hour${diffInHours > 1 ? 's' : ''} ago`;
        } else if (diffInDays < 7) {
            return `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago`;
        } else {
            return date.toLocaleDateString();
        }
    },
    
    cleanup() {
        if (this.eventSource) {
            this.eventSource.close();
            this.eventSource = null;
        }
        if (this.broadcastChannel) {
            this.broadcastChannel.close();
            this.broadcastChannel = null;
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
<script src="assets/js/shared-scripts.js"></script>
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