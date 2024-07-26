<header class="h-24 font-eurostile text-white text-xl font-extrabold" id="navbar">
        <!-- Whole NavBar Container -->
        <div class="h-full px-6 flex justify-between items-center">
            <!-- Main NavBar -->
            <nav class="flex w-1/2 h-full justify-between items-center">
                <a href="/">
                    <img class="h-16" src="assets/images/icons/ZealiaLogoStarTrail-1.png" alt="ZealiaLogoStarTrail-2.png"/>
                </a>

                <ul class="bg-red-400 transition-colors ease-in-out duration-300 hover:text-black flex w-4/5 justify-between font-semibold">
                    <li class="hover:text-white">
                        <a href="/" class="">Home</a>
                    </li>
                    
                    <li class="hover:text-white">
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

                    <li class="hover:text-white">
                        <a href="/about" class="">About</a>
                    </li>

                    <li class="hover:text-white">
                        <a href="/learn" class="">Learn</a>
                    </li>
                </ul>
            </nav>

            <div class="text-black w-2/12 flex justify-evenly">
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
                    <!-- TO-DO: Hover Image Effect -->
                    <a href="/login" class="before:content-[url('/assets/images/icons/black-oval.png')] before:hidden before:absolute hover:text-white hover:before:block">
                        <span class="">Login</span>
                    </a>

                    <a href="/register" class="hover:text-white">
                        <span class="">Sign Up</span>
                    </a>
                <?php endif; ?>
            </div> 
        </div>
    </header>
