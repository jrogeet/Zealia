<!--  VIEW FILE -->

<?php view('partials/head.view.php'); ?>

<body>
    <?php view('partials/nav.view.php')?>

    <?php //var_dump($encodedFilteredidNmbti); ?>
    <?php //dd($filteredidNmbti)?>


    <main class="">
        <!-- LEFT CLASS LIST  -->
        <div class='class-list'  style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: beige;"; }?>">
                <div class="class-list-header">
                    <span class='class-list-title'  style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">Class Student List:</span>
                    <span class="list-student-count" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">Total No. of Students: <?= count($stu_id) ?></span>
                </div>

                <ul class="student-name-list">
            <?php
                // if ($curUInList === 1) {
                    foreach($stu_info as $student) {
                        $stu_l = ucfirst($student['l_name']);
                        $stu_f = ucfirst($student['f_name']);
                    ?>
                        <li class='student-name-li' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(220, 220, 201);"; }?>">
                            <a class="class-list-info" href="/profile?id=<?= $student['school_id'] ?>">
                                <span class='student-name' style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>"><?php echo "{$stu_l}, {$stu_f}" ?></span>
                                
                                <?php if($_SESSION['user']['account_type'] === 'professor'):?>
                                    <form action="/room" method="POST">
                                        <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">
                                        <button type="submit" name="delete" value="<?php echo implode(',', [$student['school_id'], $_GET['room_id']]); ?>" class="delete-student-btn">
                                            Remove
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        <div class="main-function-container">
<!-- MAIN BOX -->
            <div class="main-container" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: beige;"; }?>"> 
                <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
                    <div class="tabs-container">
                        <!-- <form method="POST" action=""> -->
                            <div class="room-tabs" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "    border-bottom: 0.2rem solid black;"; }?>">
                                <button onclick="tabs('group')"  class='group-tab tabs'>
                                    <span class="tabs-text">GROUP</span>
                                </button>

                                <button onclick="tabs('requests')"  class='join-requests-tab tabs'>
                                    <span class="tabs-text">JOIN REQUESTS</span>
                                </button>
                                
                                <button onclick="tabs('edit')" class="tabs edit-tab">
                                    EDIT ROOM
                                </button>
                            </div>
                            
                        <!-- </form> -->
                    </div>
                    
                    <div class="group-parent-container">
                        <div class="inner-tabs">
                            <button onclick="innerTabs('results')"  class='result-tab-btn inner-tabs-btn tabs'>
                                <span class="tabs-text">Results</span>
                            </button>

                            <button onclick="innerTabs('grouptool')"  class='grouping-tool-btn inner-tabs-btn tabs'>
                                <span class="grouping-tool-text tabs-text">Grouping Tool</span>
                            </button>
                        </div>

                        <div class="group-tool-container" style="display: none">
                            <input type="hidden" id="phpData" value="<?= $idNmbti ?>">

                            <span class="student-count-display">Total No. of Students: <?= count($stu_id) ?></span>
                            <span class="tested-count">No. of Students who already took the test: <?= count($filteredidNmbti) ?></span>
                            <span class="not-tested-count">No. of Students who haven't taken the test yet: <?= count($stuNoType) ?></span>

                            <div class="group-btn-container">
                                <a href="/groups"><button onclick="grouped()" id="btn1" class="group-btn" >CREATE</button></a>
                                <!-- <button onclick="grouped()" id="btn1" class="group-btn" >CREATE</button> -->
                                <!-- <button onclick="grouped()" id="" class="result-btn">Show Result</button> -->
                            </div>

                            <div class="not-tested-container">
                                <p>It seems like not everyone has taken the test.</p>
                                <p>If you continue, only those who took the test will be grouped.</p>
                                <button onclick="groupedAgain()" id="btn2" class="group-btn" >Continue?</button>
                            </div>

                            <form class="hidden-group-form" id="groupings" action="/groups" method="post">
                                <input type="hidden" name="filteredidnmbti" id="filteredidnmbti" value="<?= htmlspecialchars($encodedFilteredidNmbti, ENT_QUOTES, 'UTF-8') ?>"> 
                                <input type="hidden" name="stunotype" id="stunotype" value="<?= count($stuNoType) ?>">
                                <!-- <input type="hidden" name="grouped" id="grouped" value="<?php // echo $grouped; ?>"> -->
                                <input type="hidden" name="grouped" id="grouped" value="">
                                <input type="hidden" name="room_id" value="<?= $room_info['room_id']?>">
                                <!-- <input type="submit" value="Submit"> -->
                            </form>

                            <span id="output1" class="tempo-results"></span>
                        </div>
    
<!-- GROUPS TABLE -->
                        <div class="result-wrap" >
                        <?php 
                            $data = [
                                'roomHasGroup' => $roomHasGroup,
                                'room_id' => $room_info['room_id'],
                                'encodedstu_info' => $encodedstu_info,
                            ];
                            if (isset($decodedGroup)) {
                                $data['decodedGroup'] = $decodedGroup;
                                $data['encodedGroup'] = $encodedGroup;
                                $data['idNtype'] = $idNtype;
                            }
                            view('rooms/groups/groups-table.view.php', $data);
                            ?>
                        </div>
                        <!-- RESULT-WRAP END -->
                    </div>
                    <!--  GROUP-PARENT-CONTAINER END -->



                    <div class="requests-container">
                        <div class="room-reqs">

                            <span class="request-header">REQUESTS:</span>

                            <ul class="request-ul">
                            <?php 
                                foreach ($requests as $request) {
                                    ?>
                                    <li class="request-li">
                                        <div class="req-info-container">
                                            <ul class="req-info-ul">
                                                <li class="req-info-li"><span><?php echo "{$request['l_name']}, {$request['f_name']}";?></span></li>
                                                <li class="req-info-li"><span><?php echo "School ID: {$request['school_id']}"?></span></li>
                                                <li class="req-info-li"><span><?php echo "Email: {$request['email']}"?></span></li>
                                            </ul>
                                            <form method="POST" action="/room">
                                                <div class="acc-dec-container">
                                                    <button type="submit" class="acc-dec-btn" name="accept" value="<?php echo implode(',', [$request['school_id'], $_GET['room_id']]); ?>">
                                                        Accept
                                                    </button>
                                                    <button type="submit" class="acc-dec-btn" name="decline" value="<?php echo implode(',', [$request['school_id'], $_GET['room_id']]); ?>">
                                                        Decline
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- REQUESTS-CONTAINER END -->

                    <div class="edit-container" id="edit-container" style="display: none;">
                        <form method="POST" action="/room" class="create-room-form">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">
                            <label for="body" class="room-name-title">Change Room Name:</label>

                            <div class="name-input-container">
                                <input type="text" name="room_name" class="name-input" placeholder="<?= $room_info['room_name']?>" required>
                                <?php if (isset($errors['room_name'])) : ?>
                                    <p class="error-message"><?= $errors['room_name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <button class="update-button" type="submit">UPDATE</button>
                        </form>
                
                        <form method="POST" action="/room">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="room_id" value="<?= $room_info['room_id'] ?>">
                            <button type="button" onclick="document.getElementById('delete-button-confirm').style.display = 'block'; document.getElementById('delete-button-show').style.display = 'none';" class="delete-button" id="delete-button-show">Delete Room Forever</button>
                            <button type="submit" class="delete-button" id="delete-button-confirm" style="display: none">Confirm Deletion</button>
                        </form>
                    </div>
                        <!-- EDIT-ROOM-CONTAINER END -->



<!-- STUDENT's VIEW -->
                <?php elseif ($_SESSION['user']['account_type'] === 'student'):?>
                    <div>

                    <div class="result-wrap" >
                        <?php 
                            $data = [
                                'roomHasGroup' => $roomHasGroup,
                                'room_id' => $room_info['room_id'],
                                'encodedstu_info' => $encodedstu_info,
                            ];
                            if (isset($decodedGroup)) {
                                $data['decodedGroup'] = $decodedGroup;
                                $data['encodedGroup'] = $encodedGroup;
                                $data['idNtype'] = $idNtype;
                            }
                            view('rooms/groups/groups-table.view.php', $data);
                            ?>
                        </div>
                        </div>
                    
                <?php endif;?>
            </div>
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>

    <script src="assets/js/shared-scripts.js"></script>
    <script src="assets/js/distribution.js"></script>
    <!-- <script src="../rooms/shared-scripts.js"></script> -->
    
</body>

</html>