<!-- mobile nav -->
<header class="fixed lg:hidden flex z-50 w-full bg-white1 min-w-[320px] min-h-10 font-synemed" id="nav">
    <a class="ml-2 mx-auto p-2" id="button"><img class="w-6 h-auto" src="assets/images/vectors/icons/table.png"></a>
    <a class="mx-auto p-2"><img class="w-6 h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png"></a>
    <a class="mr-2 mx-auto p-2">tao</a>

    <ul id="dropdown" class="hidden fixed z-50 block w-full bg-white2 font-synemed top-10">
        
        <a href="/" class="py-2 w-screen"><li class="w-auto h-fit border-b border-t border-black1 shadow-sm py-2 pl-2">Home</li></a>
        
        <a href="<?php if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['account_type'] == 'admin') {
                echo '/admin';
            } else {
                echo '/dashboard';
            }
        } else {
            echo '/login';
        } ?>" class="py-2 w-screen"><li class="w-auto h-fit border-b border-black1 shadow-sm py-2 pl-2">Dashboard</li></a>
        <a href="/about" class="py-2 w-screen"><li class="w-auto h-fit border-b border-black1 shadow-sm py-2 pl-2">About</li></a>
        <a href="/submit-ticket" class="py-2 w-screen"><li class="w-auto h-fit border-b border-black1 shadow-sm py-2 pl-2">Contact</li></a>
        
    </ul>
</header>

<!-- desktop nav -->
<header class="hidden relative lg:block bg-white1 z-50 shadow-md h-20 w-full content-center" id="navbar">
    <!-- object container -->
    <div class="flex h-fit w-full justify-between font-synesemi text-xl text-black1 mx-auto px-[1rem]">
        <!-- Main NavBar -->
        <nav class="relative flex w-1/2 h-14 gap-14 ">
            <a href="/">
                <img class="w-0 h-0 max-h-14 max-w-14 sm:w-14 sm:h-auto" src="assets/images/zealia-logos/Zealia_Logo_Flat/BLUE/DARK-1/FullZ_Flat_BLUEDARK_1.png" alt="Zealia Logo"/>
            </a>

            <!-- text options -->
            <ul class="relative flex my-auto w-2/3">
                <li class="mx-auto">
                    <a href="/" class="p-2">Home</a>
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
                    } ?>" class="p-2">Dashboard</a>
                </li>

                <li class="mx-auto">
                    <a href="/about" class="p-2">About</a>
                </li>
                <li class="mx-auto">
                    <a href="/submit-ticket" class="p-2">Contact</a>
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


<script>
    document.getElementById('button').addEventListener('click', function() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    });

    // keep track of previous scroll position
    let prevScrollPos = window.pageYOffset;

    window.addEventListener('scroll', function() {
    // current scroll position
    const currentScrollPos = window.pageYOffset;

    if(prevScrollPos < currentScrollPos && currentScrollPos > 40){
        // user has scrolled up
        document.getElementById('nav').classList.add('hidden');
    }else if(prevScrollPos > currentScrollPos && currentScrollPos > 40) {
        // user has scrolled down
        document.getElementById('nav').classList.remove('hidden');
    }

    // update previous scroll position
    prevScrollPos = currentScrollPos;
    });

</script>