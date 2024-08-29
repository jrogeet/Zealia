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
                    <div class="dropdown-container">
                        <label class="dropdown dd-account">                          
                            <ul class="dd-menu dd-menu-account">
                                <a href="/account">
                                    <li class="account-menu-li">
                                        <span class="account-menu-text">Account</span>
                                    </li>
                                </a>
                                <li class="divider"></li>
                                <li class="account-menu-li">
                                    <form method="POST" action="/login">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="account-btns logout-btn">Log Out</button>
                                    </form>
                                </li>
                            </ul>
                        </label>
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
