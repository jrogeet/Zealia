<!-- mobile/desktop footer -->
<footer class="relative left-0 top-[100%] mt-10 transform translate-y-full bg-blue3 items-center h-auto w-[100vw] py-4 bottom-0">
    <div class="h-fit w-[100%] flex flex-col justify-between px-10">
        <div class="flex justify-between mb-12">
            <ul class="flex flex-col font-satoshimed text-[5vw]  xl:text-4xl text-blue2">
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
            <a class="font-clashbold text-[5vw] xl:text-4xl text-white1" href="/submit-ticket">Submit a Ticket</a>
        </div>

        <div class="relative flex left-1/2 tranform -translate-x-1/2 w-fit">
            <img class="mx-auto h-auto w-[95%]" src="assets/images/zealia-logos/full/white.png">
        </div>
    </div>
</footer>