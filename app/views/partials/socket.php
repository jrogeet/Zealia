<?php
$config = require base_path('app/model/config.php');
$socketClientUrl = $config['socket']['client_url'];
?>

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
    // Store notifications locally
    let notificationCount = parseInt(localStorage.getItem('unreadNotifications')) || 0;
    let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
    let isOnline = navigator.onLine;

    // Initialize Socket connection
    let socket;
    
    function initializeSocket() {
        if (isOnline) {
            socket = io('<?= $socketClientUrl ?>', {
                transports: ['websocket'],
                reconnection: true,
                reconnectionAttempts: 5,
                reconnectionDelay: 1000
            });

            socket.on('connect', () => {
                console.log('Connected to notification system');
                syncNotifications();
            });

            socket.on('new_notification', (data) => {
                addNotification(data);
                updateNotificationUI();
            });

            socket.on('connect_error', () => {
                isOnline = false;
                updateConnectionStatus();
            });
        }
    }

    // Handle offline/online events
    window.addEventListener('online', () => {
        isOnline = true;
        updateConnectionStatus();
        initializeSocket();
    });

    window.addEventListener('offline', () => {
        isOnline = false;
        updateConnectionStatus();
    });

    function updateConnectionStatus() {
        const statusIndicator = document.getElementById('connection-status');
        if (statusIndicator) {
            statusIndicator.className = isOnline ? 'text-green-500' : 'text-red-500';
            statusIndicator.textContent = isOnline ? 'Connected' : 'Offline';
        }
    }

    function addNotification(notification) {
        notifications.unshift(notification);
        notificationCount++;
        
        // Store locally
        localStorage.setItem('notifications', JSON.stringify(notifications.slice(0, 50))); // Keep last 50
        localStorage.setItem('unreadNotifications', notificationCount);
        
        updateNotificationUI();
    }

    function updateNotificationUI() {
        const counter = document.getElementById('notification-counter');
        const list = document.getElementById('notification-list');
        
        if (counter) {
            counter.textContent = notificationCount;
            counter.style.display = notificationCount > 0 ? 'block' : 'none';
        }

        if (list && notifications.length > 0) {
            list.innerHTML = notifications
                .slice(0, 5) // Show latest 5
                .map(notif => `
                    <a href="${notif.link}" class="block px-4 py-2 hover:bg-gray-100">
                        <p class="text-sm font-medium">${notif.message}</p>
                        <p class="text-xs text-gray-500">${timeAgo(notif.timestamp)}</p>
                    </a>
                `).join('');
        }
    }

    function markAllAsRead() {
        notificationCount = 0;
        localStorage.setItem('unreadNotifications', 0);
        updateNotificationUI();

        // Sync with server when online
        if (isOnline) {
            fetch('/notifications/mark-read', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
            });
        }
    }

    function syncNotifications() {
        // Fetch latest notifications from server when back online
        fetch('/notifications/sync')
            .then(response => response.json())
            .then(data => {
                notifications = data.notifications;
                notificationCount = data.unreadCount;
                localStorage.setItem('notifications', JSON.stringify(notifications));
                localStorage.setItem('unreadNotifications', notificationCount);
                updateNotificationUI();
            });
    }

    function timeAgo(timestamp) {
        const seconds = Math.floor((new Date() - new Date(timestamp)) / 1000);
        
        let interval = seconds / 31536000;
        if (interval > 1) return Math.floor(interval) + ' years ago';
        interval = seconds / 2592000;
        if (interval > 1) return Math.floor(interval) + ' months ago';
        interval = seconds / 86400;
        if (interval > 1) return Math.floor(interval) + ' days ago';
        interval = seconds / 3600;
        if (interval > 1) return Math.floor(interval) + ' hours ago';
        interval = seconds / 60;
        if (interval > 1) return Math.floor(interval) + ' minutes ago';
        return Math.floor(seconds) + ' seconds ago';
    }

    // Initialize
    initializeSocket();
    updateNotificationUI();
</script>