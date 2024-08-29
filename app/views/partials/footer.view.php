<footer class=" bg-blue3 flex flex-col items-center h-[40.625rem] w-full py-3.5 bottom-0">
    <div class=" h-full w-[1400px] flex flex-col justify-between">
        <div class=" flex justify-between">
            <ul class="flex flex-col font-synesemi text-4xl text-blue2">
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

                <li class="inline-block">
                    <a href="/submit-ticket" class="">Contact</a>
                </li>
            </ul>
            <a class="font-synebold text-4xl text-white1" href="/submit-ticket">Submit a Ticket</a>
        </div>

        <div class="">
            <img class="h-[20.12331rem]" src="assets/images/zealia-logos/full/white.png">
        </div>
    </div>
</footer>