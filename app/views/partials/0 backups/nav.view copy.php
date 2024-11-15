<!-- white container -->
<header class="relative block bg-white1 z-50 shadow-md h-20 w-full content-center" id="navbar">
    <!-- object container -->
    <div class="flex h-fit w-full justify-between font-satoshiblack text-xl text-black1 border border-black mx-auto px-[1rem]">
        <!-- Main NavBar -->
        <nav class="relative flex w-1/2 h-14 gap-14 bg-red-300">
            <a href="/">
                <img class="w-0 h-0 max-h-14 max-w-14 sm:w-14 sm:h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png" alt="Zealia Logo"/>
            </a>

            <!-- text options -->
            <ul class="relative flex my-auto w-2/3">
                <li class="mx-auto">
                    <a href="/" class="p-2 border border-black">Home</a>
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
                    } ?>" class="p-2 border border-black">Dashboard</a>
                </li>

                <li class="mx-auto">
                    <a href="/about" class="p-2 border border-black">About</a>
                </li>
                <li class="mx-auto">
                    <a href="/submit-ticket" class="p-2 border border-black">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- LOGIN & SIGNUP Part -->
        <div class="relative flex gap-[1.44rem] items-center">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="relative text-xl">
                    <button class="z-50 flex justify-between items-center px-4 h-12 w-56  bg-blue3 border rounded-lg" id="navDDbutton">
                        <span class="text-white1 w-4/5 text-left truncate"><?= "{$_SESSION['user']['f_name']}  {$_SESSION['user']['l_name']}" ?></span>
                        <div class="w-0 h-0 border-l-[6px] border-l-transparent border-r-[6px] border-r-transparent border-t-[12px] border-white1"></div>
                    </button>
                    <!-- TEMPO -->

                    <div class="z-40 hidden absolute flex-col justify-evenly bg-white1 h-[6.5rem] w-56 top-[2.375rem] px-2 border-2 border-black1 rounded-b-2xl" id="navDropDown">
                        <a href="<?php if($_SESSION['user']['account_type'] === 'admin'):?>/admin-settings<?php else: ?>/account<?php endif; ?>">
                            <span class="">Account Settings</span>
                        </a>

                        <div class="w-52 h-[1.5px] bg-black1"></div>

                        <form method="POST" action="/login">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="text-red1">Log Out</button>
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
                                    <button class="text-red1">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </label> -->
                </div>

            <?php else: ?>
                <a href="/login" class="bg-blue3 rounded-lg h-10 w-[6.25rem] flex justify-center items-center">
                    <span class="text-white">Sign In</span>
                </a>

                <a href="/register" class="bg-orange1 rounded-lg h-10 w-[6.25rem] flex justify-center items-center">
                    <span class="text-offBlack">Sign Up</span>
                </a>
            <?php endif; ?>
        </div> 
    </div>
</header>
