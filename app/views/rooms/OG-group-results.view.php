<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css"  href="assets/css/groups/group-result.css">
</head>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>
<body>
    <?php //view('partials/nav.view.php', ['notifications' => $notifications])?>

    <main class="main-container">
        



        <div class="group-table-container">
            <?php foreach ($decodedGroup as $index => $group) {?>
                <table class="group-outer-table">
                    <tr>
                        <th>
                            <span>Group</span>
                            <span><?= $index + 1?></span>
                        </th>
                    </tr>

                    <tr>
                        <td>
                            <table class="group-inner-table">
                                <tr>
                                    <th colspan="3">Designers</th>
                                </tr>

                                <?php 
                                foreach ($group as $member) {
                                    if($member[2] === "Lead Designer / Group Leader") { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $member[0] ?></td>
                                            <td><?= $member[1] ?></td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                                <?php 
                                foreach ($group as $member) {
                                    if($member[2] === "Designer") { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $member[0] ?></td>
                                            <td><?= $member[1] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table class="group-inner-table">
                                <tr>
                                    <th colspan="3">Analysts</th>
                                </tr>
                                <?php 
                                foreach ($group as $member) {
                                    if($member[2] === "Lead Analyst") { ?>
                                        <tr>
                                            <td><?= $member[0] ?></td>
                                            <td><?= $member[1] ?></td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>


                                <?php 
                                foreach ($group as $member) {
                                    if($member[2] === "Analyst") { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $member[0] ?></td>
                                            <td><?= $member[1] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table class="group-inner-table">
                                <tr>
                                    <th colspan="3">Programmers</th>
                                </tr>
                                <?php 
                                foreach ($group as $member) {
                                    if($member[2] === "Lead Programmer") { ?>
                                        <tr>
                                            <td><?= $member[0] ?></td>
                                            <td><?= $member[1] ?></td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>                                

                                <?php 
                                foreach ($group as $member) {
                                    if($member[2] === "Programmer") { ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $member[0] ?></td>
                                            <td><?= $member[1] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                </table>
            <?php }?>
        </div>

        <?php var_dump($encoded);?>
        <div>
            <form class="hidden-group-form" id="groupings" action="/groups/confirm" method="post">
                <input type="hidden" name="groupsJson" value="<?= htmlspecialchars($encoded) ?>">
                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                <button type="submit">Confirm Groups</button>
            </form>
        </div>





            <!-- <div class='class-list'>
                <span class='class-list-title'>Class Student List:</span>
                <span>Total No. of Students: <?= count($stu_id) ?></span>
                <ul class="student-name-list">
            <?php
                // if ($curUInList === 1) {

                    foreach($stu_info as $student) {    

                        $stu_l = ucfirst($student['l_name']);
                        $stu_f = ucfirst($student['f_name']);
                    ?>
                        <li class='student-name-li'>
                            <span class='student-name'><?php echo "{$stu_l}, {$stu_f}" ?></span>
                        </li>
                    <?php } ?>



                </ul>
            </div> -->


            <section class="groups-table-container">



            </section>
    </main>


    <script src="<?php echo base_path('public/assets/js/shared-scripts.js');?>"></script>

</body>


</html>