<div class="fixed z-50 h-screen transition-all duration-300 bg-blue3 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'w-20' : 'w-48' ?>" id="admin-sidebar">
    <button id="toggle-sidebar" class="absolute p-2 rounded-full -right-4 top-4 bg-blue3">
        <img src="assets/images/icons/nav-icons/angle-double-left.svg" alt="Toggle" class="w-4 h-4" id="toggle-icon">
    </button>
    
    <div class="flex flex-col justify-between h-full p-4 text-white" id="sidebar-content">
        <div class="flex flex-col items-center">
            <a href="/admin">
                <img class="h-10 expanded-logo" src="assets/images/zealia-logos/full/white.png" alt="Zealia Logo"/>
                <img class="hidden h-10 collapsed-logo" src="assets/images/zealia-logos/Zealia_Logo_Flat/OFFWHITE/FullZ_Flat_OFFWHITE.png" alt="Zealia Icon"/>
            </a>
            <h5 class="text-white expanded-content">ADMIN</h5>
        </div>
        
        <div class="flex flex-col gap-4">
            <a href="/admin" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/dashboard-icon.svg" alt="Dashboard" class="w-6 h-6">
                <span class="expanded-content">Dashboard</span>
            </a>
            
            <a href="/admin-accounts" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/accounts-icon.svg" alt="Accounts" class="w-6 h-6">
                <span class="expanded-content">Accounts</span>
            </a>
            
            <a href="/admin-rooms" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/rooms-icon.svg" alt="Rooms" class="w-6 h-6">
                <span class="expanded-content">Rooms</span>
            </a>
            
            <a href="/admin-tickets" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/tickets-icon.svg" alt="Tickets" class="w-6 h-6">
                <span class="expanded-content">Tickets</span>
            </a>
            
            <a href="/admin-logs" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/logs-icon.svg" alt="Logs" class="w-6 h-6">
                <span class="expanded-content">Logs</span>
            </a>
            
            <a href="/admin-settings" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/settings-icon.svg" alt="Settings" class="w-6 h-6">
                <span class="expanded-content">Settings</span>
            </a>
            
            <a href="/" class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                <img src="assets/images/icons/nav-icons/user-pages-icon.svg" alt="User Pages" class="w-6 h-6">
                <span class="text-sm expanded-content">Visit User Pages</span>
            </a>
            
            <form method="POST" action="/login">
                <input type="hidden" name="_method" value="DELETE" />
                <button class="flex items-center gap-2 p-2 rounded hover:bg-blue2 hover:text-blackpri">
                    <img src="assets/images/icons/nav-icons/logout-icon.svg" alt="Logout" class="w-6 h-6">
                    <span class="text-rederr expanded-content">Log Out</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const sidebar = document.getElementById('admin-sidebar');
    const toggleIcon = document.getElementById('toggle-icon');
    const expandedElements = document.querySelectorAll('.expanded-content');
    const expandedLogo = document.querySelector('.expanded-logo');
    const collapsedLogo = document.querySelector('.collapsed-logo');

    // Initialize state based on session
    if (<?= json_encode($_SESSION['page-settings']['admin_nav_toggle']) ?>) {
        expandedElements.forEach(el => el.classList.add('hidden'));
        expandedLogo.classList.add('hidden');
        collapsedLogo.classList.remove('hidden');
        toggleIcon.classList.add('rotate-180');
    }

    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        // Toggle sidebar width
        sidebar.classList.toggle('w-48');
        sidebar.classList.toggle('w-20');
        
        // Rotate toggle icon
        toggleIcon.classList.toggle('rotate-180');
        
        // Toggle visibility of text content
        expandedElements.forEach(el => el.classList.toggle('hidden'));
        
        // Switch logos
        expandedLogo.classList.toggle('hidden');
        collapsedLogo.classList.toggle('hidden');

        // Update session via AJAX
        fetch('/update-nav-toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                toggle: sidebar.classList.contains('w-20')
            })
        });
    });
</script>