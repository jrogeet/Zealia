<header class="bg-white1 fixed z-50 shadow-md h-20 w-full justify-center  content-center top-0" id="navbar">
        <!-- Whole NavBar Container -->
        <div class="flex h-12 mx-14 justify-between font-synesemi text-xl text-black1">
            <!-- Main NavBar -->
            <nav class="flex gap-14">
                <a href="/">
                    <img class="h-14" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png" alt="Zealia Logo"/>
                </a>

                <ul class="w-[30.93rem] [&>*]:content-center gap-14 flex">
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
            </nav>

            <!-- LOGIN & SIGNUP Part -->
            <div class="flex gap-[1.44rem] items-center">
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
