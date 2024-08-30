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
                    <div class="">
                        <div class="">
                            <button class="" id="navDDbutton">Name</button>
                            <!-- TEMPO -->
                            <span>v</span>
                        </div>

                        <div class="hidden" id="navDropDown">
                            <a href="/account">
                                <span class="">Account Settings</span>
                            </a>

                            <div class=""></div>

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
