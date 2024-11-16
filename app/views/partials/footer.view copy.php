<!-- desktop footer -->
<footer class="flex bg-blue3 flex-col items-center h-auto w-[100vw] py-3.5 bottom-0">
    <div class=" h-full w-[1400px] flex flex-col justify-between">
        <div class=" flex justify-between">
            <ul class="flex flex-col font-satoshimed text-4xl text-blue2">
                <li class="inline-block">
                    <a href="/" class="">Home</a>
                </li>
                
                <li class="inline-block">
                    <a href="<?php if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['account_type'] == 'admin') {
                            echo '/admin';
                        } else {
                            echo '/dashboard';
                        }
                    } else {
                        echo '/login';
                    } ?>" class="">Dashboard</a>
                </li>

                <li class="inline-block">
                    <a href="/about" class="">About</a>
                </li>

            </ul>
            <a class="font-clashbold text-4xl text-white" href="/submit-ticket">Submit a Ticket</a>
        </div>

        <div class="relative block left-1/2 tranform -translate-x-1/2 w-fit">
            <img class="h-auto w-[100vw] border border-black" src="assets/images/zealia-logos/full/white.png">
        </div>
    </div>
</footer>