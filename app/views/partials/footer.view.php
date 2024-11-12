<!-- mobile/desktop footer -->
<footer class="flex justify-center mt-10 border-t border-blackpri bg-whitecon items-center h-[33.75rem] w-screen">
    <div class="flex flex-col justify-between max-w-[96rem] px-10 h-full">
        <div class="flex justify-between mb-12">
            <ul class="flex flex-col font-synereg text-[5vw]  xl:text-4xl text-blue2">
                <li class="inline-block">
                    <a href="/" class="font-satoshimed">Home</a>
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
                    } ?>" class="font-satoshimed">Dashboard</a>
                </li>

                <li class="inline-block">
                    <a href="/about" class="font-satoshimed">About</a>
                </li>

            </ul>
            <a class="font-satoshimed text-[5vw] xl:text-4xl text-white1" href="/submit-ticket">Submit a Ticket</a>
        </div>

        <img class="" src="assets/images/zealia-logos/Zealia_Logo_Flat/z-green-with-text.png" alt="zealia logo">
    </div>
</footer>