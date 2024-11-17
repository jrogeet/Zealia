<!-- mobile/desktop footer -->
<footer class="w-full mt-auto bg-blue3">
    <div class="flex flex-col justify-between w-full px-10 pt-4 h-fit">
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
            <a class="font-clashbold text-[5vw] xl:text-4xl text-white" href="/submit-ticket">Submit a Ticket</a>
        </div>

        <div class="relative flex -translate-x-1/2 left-1/2 tranform w-fit">
            <img class="mx-auto h-auto w-[95%]" src="assets/images/Zealia-Half_footer.png">
        </div>
    </div>
</footer>