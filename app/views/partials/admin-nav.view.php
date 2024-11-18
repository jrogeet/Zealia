<div class="z-10 relative block w-72 h-[100vh] text-white2 font-satoshimed min-w-[18rem] min-h-[75rem]">

    <div class="fixed h-screen p-6 bg-blue3 w-72">
        <div class="relative">
            <a href="/">
                <img class="h-14" src="assets/images/zealia-logos/full/white.png" alt="Zealia Logo"/>
            </a>
            <h5 class="relative -mt-2 text-lg text-white left-1/3">ADMIN</H5>
        </div>
        
        <div class="relative block mt-6 h-fit">
            <a href="/admin"            class="block w-full py-6 pl-4 my-4 text-3xl text-left text-white hover:text-orangeaccent">Dashboard</a>
            <a href="/admin-accounts"   class="block w-full py-6 pl-4 my-4 text-3xl text-left text-white hover:text-orangeaccent">Accounts</a>
            <a href="/admin-rooms"      class="block w-full py-6 pl-4 my-4 text-3xl text-left text-white hover:text-orangeaccent">Rooms</a>
            <a href="/admin-tickets"    class="block w-full py-6 pl-4 my-4 text-3xl text-left text-white hover:text-orangeaccent">Tickets</a>
            <a href="/admin-logs"       class="block w-full py-6 pl-4 my-4 text-3xl text-left text-white hover:text-orangeaccent">Logs</a>
            <a href="/admin-settings"   class="block w-full py-6 pl-4 my-4 text-3xl text-left text-white hover:text-orangeaccent">Settings</a>
            <form method="POST" action="/login">
                <input type="hidden" name="_method" value="DELETE" />
                <button class="block w-full py-6 pl-4 my-4 text-3xl text-left text-rederr">Log Out</button>
            </form>
        </div>
    </div>
</div>