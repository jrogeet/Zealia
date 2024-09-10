<?php view('partials/head.view.php'); ?>

<body class="">
    <?php view('partials/nav.view.php')?>
    <?php dd($currentUser);?>
    <?php //dd($prof_info);?>
    <?php //dd($room_info);?>
    <?php //dd($notifications); ?>

    <main class="main-container">
        <div class="heading-text-container">
            <span class="heading-text"></span>
        </div>

        <div class="joinxrooms-container">
            <div class="join-container">
                <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                    <button onclick="document.getElementById('create-room-form').style.display = 'flex'; document.getElementById('create-room-btn').style.display = 'none';" class="create-room-btn" id="create-room-btn">Create Room</button>
                    <div class="create-room-form-container" id="create-room-form" style="display: none;">
                        <form method="POST" action="/dashboard" class="create-room-form">
                            <label for="body" class="room-name-title">Room Name:</label>
                            <input type="hidden" name="create" value="create">
                            <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">
                   

                            <div class="room-name-input-container">
                                <input class="room-name-input" id="room_name" name="room_name" placeholder="Room Name" required>

                                <?php if (isset($errors['room_name'])) : ?>
                                    <p class="error-message"><?= $errors['room_name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <p>
                                <button class="create-room-form-btn" type="submit">Create</button>
                            </p>
                        </form>
                    </div>



                <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
                    <form method="POST" action="/dashboard" class="join-room-form">
                        <div class="join-input-container">
                            <label for="body" class="room-name-title">Enter Code:</label>
                            <input type="hidden" name="join" value="join">
                            <input type="number" class="room-code-input" id="room_code" name="room_code">

                            <?php if (isset($errors['room_existence'])) : ?>
                                <p class="error-message"><?= $errors['room_existence'] ?></p>
                            <?php elseif (isset($errors['is_joined'])) : ?>
                                <p class="error-message"><?= $errors['is_joined'] ?></p>
                            <?php endif; ?>

                            <button type="submit" class="join-btn">Join</button>
                        </div>
                    </form>
                <?php endif;?>
            </div>




                    <!-- <span style="color: red; font-family:Verdana, Geneva, Tahoma, sans-serif;"><?php echo strtoupper($room_info['l_name']) ?></span> -->

            <div class="roomnsearch-container" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: beige;"; }?>">
                <form method="POST" action="/dashboard" class="search-form">
                    <input type="hidden" name="search" value="search">
                    <input type="hidden" name="encoded_room_info" value="<?= htmlspecialchars($encoded_room_info, ENT_QUOTES, 'UTF-8')?>">

                    <input class="search-input" type="text" name="search_input" placeholder="Search" required style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "border: 1px solid black;"; }?>">
                    <button class="search-btn" type="submit" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">Search</button>
                </form>

                <div class="sort-btn-container">
                    <button onclick="document.getElementById('searched-ascending').style.display = 'flex'; document.getElementById('searched-descending').style.display = 'none'; document.getElementById('searched-default').style.display = 'none';" class="asc-sort sort-btn" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">Earliest</button>
                    <button onclick="document.getElementById('searched-descending').style.display = 'flex'; document.getElementById('searched-ascending').style.display = 'none'; document.getElementById('searched-default').style.display = 'none';" class="desc-sort sort-btn" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">Latest</button>
                </div>
   

                <div class="room-container">
                    <?php if(isset($searched_rooms)):?>
                        <?php if(!empty($searched_rooms)):?>
                            <div class="room-wraps searched-default" id="searched-default">
                                <?php foreach($searched_rooms as $rooms) { ?>
                                
                                <a href="/room?room_id=<?= $rooms['room_id']?>"> 
                                    <div class='room-box'  style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201); border: 1px solid black;"; }?>">
                                        <span class='room-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_name'] ?></span>
                                        <div class="room-code-container">
                                                <?php if($_SESSION['user']['account_type'] === 'student'):?>
                                                        <span class="room-professor" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">
                                                            <?= $rooms['prof_name'] ?>
                                                        </span> 
                                                <?php endif; ?> 
                                            <span class="room-code-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">CODE:</span>
                                            <span class='room-code' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_code'] ?></span>
                                        </div>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>

                            <div class="room-wraps searched-ascending" id="searched-ascending">
                                <?php foreach($ascending_rooms as $rooms) { ?>
                                    
                                    <a href="/room?room_id=<?= $rooms['room_id']?>"> 
                                        <div class='room-box' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201);"; }?>">
                                            <span class='room-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_name'] ?></span>
                                            <div class="room-code-container">
                                                <?php if($_SESSION['user']['account_type'] === 'student'):?>
                                                        <span class="room-professor" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">
                                                            <?= $rooms['prof_name'] ?>
                                                        </span> 
                                                <?php endif; ?> 
                                            
                                                <span class="room-code-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">CODE:</span>
                                                <span class='room-code' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_code'] ?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <?php } ?>
                            </div>

                            <div class="room-wraps searched-descending" id="searched-descending" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201);"; }?>">
                                <?php foreach($descending_rooms as $rooms) { ?>
                                    
                                    <a href="/room?room_id=<?= $rooms['room_id']?>"> 
                                        <div class='room-box' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201); border: 1px solid black;"; }?>">
                                            <span class='room-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_name'] ?></span>
                                            <div class="room-code-container">
                                                <?php if($_SESSION['user']['account_type'] === 'student'):?>
                                                        <span class="room-professor" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">
                                                            <?= $rooms['prof_name'] ?>
                                                        </span> 
                                                <?php endif; ?> 
                                                <span class="room-code-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">CODE:</span>
                                                <span class='room-code' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_code'] ?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <?php } ?>
                            </div>
                            <?php elseif(empty($searched_rooms)):?>
                                <div class="no-rooms-container">
                                    <span class="no-rooms-text no-rooms-text-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">No rooms found</span>
                                    
                                    <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                                        <span class="no-rooms-text no-rooms-text-sub" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">Create a room by clicking the "Create Room" button</span>
                                    <?php elseif($_SESSION['user']['account_type'] === 'student'): ?>
                                        <span class="no-rooms-text no-rooms-text-sub">Join a room by entering the code above</span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            
                        <?php elseif(! empty($room_info)): ?>
                            <div class="room-wraps searched-default" id="searched-default" > 
                                <?php foreach($room_info as $rooms) { ?>

                                <a href="/room?room_id=<?= $rooms['room_id']?>"> 
                                    <div class='room-box' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201); border:1px solid black"; }?>">
                                        <span class='room-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_name'] ?></span>
                                        <div class="room-code-container">
                                                <?php if($_SESSION['user']['account_type'] === 'student'):?>
                                                        <span class="room-professor" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">
                                                            <?= $rooms['prof_name'] ?>
                                                        </span> 
                                                <?php endif; ?> 
                                            <span class="room-code-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">CODE:</span>
                                            <span class='room-code' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_code'] ?></span>
                                        </div>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>

                            <div class="room-wraps searched-ascending" id="searched-ascending">
                                <?php foreach($ascending_rooms as $rooms) { ?>
                                    
                                    <a href="/room?room_id=<?= $rooms['room_id']?>"> 
                                        <div class='room-box' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201); border: 1px solid black;"; }?>">
                                            <span class='room-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_name'] ?></span>
                                            <div class="room-code-container">
                                                <?php if($_SESSION['user']['account_type'] === 'student'):?>
                                                        <span class="room-professor" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">
                                                            <?= $rooms['prof_name'] ?>
                                                        </span> 
                                                <?php endif; ?> 
                                                <span class="room-code-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">CODE:</span>
                                                <span class='room-code' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_code'] ?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <?php } ?>
                            </div>

                            <div class="room-wraps searched-descending" id="searched-descending">
                                <?php foreach($descending_rooms as $rooms) { ?>
                                    
                                    <a href="/room?room_id=<?= $rooms['room_id']?>"> 
                                        <div class='room-box' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201); border: 1px solid black;"; }?>">
                                            <span class='room-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_name'] ?></span>
                                            <div class="room-code-container">
                                                <?php if($_SESSION['user']['account_type'] === 'student'):?>
                                                        <span class="room-professor" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">
                                                            <?= $rooms['prof_name'] ?>
                                                        </span> 
                                                <?php endif; ?> 
                                                <span class="room-code-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">CODE:</span>
                                                <span class='room-code' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?= $rooms['room_code'] ?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <?php } ?>
                            </div>
                    <?php else: ?>
                        <div class="no-rooms-container">
                            <span class="no-rooms-text no-rooms-text-title" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">No rooms found</span>
                            
                            <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                                <span class="no-rooms-text no-rooms-text-sub">Create a room by clicking the "Create Room" button</span>
                            <?php elseif($_SESSION['user']['account_type'] === 'student'): ?>
                                <span class="no-rooms-text no-rooms-text-sub">Join a room by entering the code above</span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>


    <script src="/assets/js/shared-scripts.js"></script>

</body>


</html>