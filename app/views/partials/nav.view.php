<header class="fixed z-50 content-center block h-20 shadow-md rounded-b-xl bg-glassmorphism-nav" id="navbar">
    <!-- object container -->
    <div class="flex items-center justify-between mx-auto px-8 h-[4.5rem]  w-[65.8125rem]">
        <!-- Main NavBar -->
        <a href="/">
                <img class="h-12" src="assets/images/zealia-logos/Zealia_Logo_Flat/z-green-border.png" alt="Zealia Logo"/>
        </a>

        <nav class=" bg-blue-400 items-center w-[26.5rem]">
            <!-- text options -->
            <ul class="flex justify-between w-full text-xl font-satoshimed">
                <li>
                    <a href="/" class="p-2">Home</a>
                </li>
                
                <li>
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

                <li>
                    <a href="/about" class="p-2">About</a>
                </li>
                <li>
                    <a href="/submit-ticket" class="p-2">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- LOGIN & SIGNUP Part -->
        <div class="min-w-[13.5rem] flex justify-between items-center text-blackpri font-clashmed ">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <!-- NOTIFICATIONS -->
                <div id="notifContainer" class="relative inline-block">
                    <button id="notificationBtn" onclick="toggle('notificationDropdown')" class="relative cursor-pointer">
                        <span class="text-3xl notification-icon">🔔</span>
                        <span id="notificationCount" class="absolute -top-[2px] -right-[2px] bg-red1 text-rederr text-sm font-clashmed rounded-2xl py-[0.05rem] px-2"></span>
                    </button>
                    <div id="notificationDropdown" class="hidden flex-col absolute right-0 top-full max-h-[25rem] w-[20rem] bg-white1 border border-black1 rounded-lg shadow overflow-hidden">
                        <div class="flex items-center justify-between px-4 py-6 pr-6 bg-black1 h-14">
                            <span class="text-2xl font-synemed text-orange1 ">Notifications</span>
                            <form action="/notifications" method="POST">
                                <button class="text-base font-synereg text-white1 hover:text-red1 " name="clear" type="submit">Clear</button>
                            </form>
                        </div>
                        <!-- <div class="bg-black1 h-[1px] my-2 w-64"></div> -->
                        <ol id="notificationList" class="flex flex-col overflow-y-auto">

                        </ol>
                    </div>
                </div>

                <div class="relative text-xl ">
                    <button onclick="toggle('navDropDown')" class="z-50 flex items-center justify-between w-56 h-12 px-4 border rounded-lg bg-greenmain" id="navDDbutton">
                        <span class="w-4/5 text-left truncate text-white1"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></span>
                        <div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[12px] border-black"></div>
                    </button>
                    <!-- TEMPO -->

                    <div class="z-40 hidden absolute flex-col justify-evenly bg-whitecon h-[6.5rem] w-56 top-[2.375rem] px-2 border-2 rounded-b-2xl" id="navDropDown">
                        <a href="<?php if($_SESSION['user']['account_type'] === 'admin'):?>/admin-settings<?php else: ?>/account<?php endif; ?>">
                            <span class="">Account Settings</span>
                        </a>

                        <div class="w-52 h-[1.5px] bg-black1"></div>

                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="text-red1">Log Out</button>
                        </form>
                    </div>

                </div>

            <?php else: ?>
                <a href="/login" class="bg-blue3 border border-blackpri rounded-lg h-10 w-[6.25rem] flex justify-center items-center">Sign In</a>
                <a href="/register" class="bg-greenmain border border-blackpri rounded-lg h-10 w-[6.25rem] flex justify-center items-center"> Sign Up</a>
            <?php endif; ?>
        </div> 
    </div>
</header>


<script>

    // const nav1 = document.getElementById('nav');
    // const nav2 = document.getElementById('navbar');
    // const navDesk = document.getElementById('navbar');
    // const burger = document.getElementById('burgButt');
    // const profile = document.getElementById('profButt');
    // const burgDD = document.getElementById('burgDD');
    // const profDD = document.getElementById('profDD');

    // const att = document.createAttribute("onresize"); //adds onresize="changeNav()" to the body
    // // Set a value of the class attribute
    // att.value = "changeNav()";
    // // Add the class attribute to the first h1;
    // document.getElementsByTagName("body")[0].setAttributeNode(att);

    // function chooseNav() {
    //     if (window.innerWidth >= 1024) {
    //         window.activeNav = nav2;
    //         nav1.classList.add("hidden");
    //         nav2.classList.remove("hidden");
    //     } else {
    //         window.activeNav = nav1;
    //         nav2.classList.add("hidden");
    //         nav1.classList.remove("hidden");
    //     }
    // }

    // function changeNav() {
    //     chooseNav(); // Reuse the same logic
    // }

    // keep track of previous scroll position
    let prevScrollPos = window.scrollY;
    let isNavVisible = true;

    window.addEventListener('scroll', function() {
        // Get the currently active nav element
        const nav = window.activeNav;
        if (!nav) return;

        // current scroll position
        const currentScrollPos = window.scrollY;
        
        // Determine if we should show/hide the nav
        if (currentScrollPos < 40) {
            // Always show nav at top of page
            isNavVisible = true;
        } else if (currentScrollPos > prevScrollPos) {
            // Scrolling DOWN
            isNavVisible = false;
        } else {
            // Scrolling UP
            isNavVisible = true;
        }

        // Apply visibility
        if (isNavVisible) {
            nav.classList.remove('hidden');
        } else {
            nav.classList.add('hidden');
        }

        // update previous scroll position
        prevScrollPos = currentScrollPos;
    });

    // // Handle zoom and resize events
    // window.addEventListener('resize', function() {
    //     chooseNav();
    //     // Reset nav visibility on resize
    //     if (window.activeNav) {
    //         window.activeNav.classList.remove('hidden');
    //     }
    // });

    // // Initial setup
    // chooseNav();

    // burger.addEventListener('click', function() {
    //     if (profDD.classList.contains("hidden")){ // closes other (profDD) if its open on burger press
    //         burgDD.classList.toggle('hidden');
    //     }else{
    //         profDD.classList.toggle('hidden');
    //         burgDD.classList.toggle('hidden');
    //     }
    // });

    // profile.addEventListener('click', function() {
    //     if (burgDD.classList.contains("hidden")){
    //         profDD.classList.toggle('hidden');
    //     }else{
    //         burgDD.classList.toggle('hidden');
    //         profDD.classList.toggle('hidden');
    //     }
    // });

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
                ? 'w-full flex flex-col p-2 bg-white1 unread border-black1 border-t-[2px] text-base ' 
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

            let jsonType = JSON.parse(type);
            let notifMessage



            switch (jsonType.type) {
                case "room_accept":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="w-full h-full font-synemed">Your request to join <span class="font-synebold">${jsonType.room_name}</span> has been accepted.</a>`;
                    break;
                case "room_decline":
                    notifMessage = `<div class="font-synemed">Your request to join <span class="font-synebold">${jsonType.room_name}</span> was declined.</div>`;
                    break;
                case "room_join":
                    notifMessage = `<div class="font-synemed"><span class="italic font-synesemi">${jsonType.student_name} </span>requested to join<span class="font-synebold"> ${jsonType.room_name}</span></div>`;
                    break;
                case "created_groups":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-synemed">Instructor <span class="italic font-synesemi">${jsonType.prof_name} </span>created groups in room:<span class="font-synebold"> ${jsonType.room_name}</span></a>`;
                    break;
                case "change_student_group":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-synemed"><span class="italic font-synesemi">${jsonType.prof_name}</span> transferred you from group:<span class="italic"> (${jsonType.old_group})</span> into <span class="font-synebold">${jsonType.new_group}</span></a>`;
                    break;
                case "change_student_role":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-synemed"><span class="italic font-synesemi">${jsonType.prof_name}</span> changed your role from:<span class="italic"> (${jsonType.old_role})</span> to <span class="font-synebold">${jsonType.new_role}</span></a>`;
                    break;
                case "room_delete":
                    notifMessage = `<div class="font-synemed">The instructor deleted the room: <span class="font-synebold">${jsonType.room_name}</span></div>`;
                    break;
                case "room_change":
                    notifMessage = `<a href="/room?room_id=${jsonType.room_id}" class="font-synemed"><span class="italic font-synesemi">${jsonType.prof_name}</span> changed room: <span class="italic"> (${jsonType.old_room_name})</span> 's name into <span class="font-synebold">${jsonType.new_room_name}</span></a>`;
                    break;
                case "student_remove":
                    notifMessage = `<div class="font-synemed">You were removed from room: <span class="font-synebold">${jsonType.room_name}</span></div>`;
                    break;
                case "room_invite":
                    notifMessage = `
                    <form action="/notifications" method="POST" class="flex items-center justify-between">
                        <input type="hidden" name="invite" value="${jsonType.room_id}">
                        <input type="hidden" name="notif_id" value="${notification.id}">
                        <div class="w-4/5 font-synemed">
                            <span class="italic font-synesemi">${jsonType.prof_name} </span>
                        invited you to join 
                            <span class="truncate font-synebold"> ${jsonType.room_name}</span>
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
                <span class="flex justify-end w-full text-sm font-synemed text-blue3">
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