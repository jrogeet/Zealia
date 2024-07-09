<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css"  href="assets/css/rooms/groups/group-result.css">
</head>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>
</style>



<body>
    <?php //view('partials/nav.view.php', ['notifications' => $notifications])?>


    <main class="main-container">

    <?php var_dump($encoded);?>
        
    <div class="table-result">
    <?php foreach ($decodedGroup as $index => $group) {?>
    <!-- OUTER TABLE -->
    <table class="result-table">
        <thead class="result-thead">
            <tr class="result-headrow">
                <th class="result-headcell" colspan="4">
                    <span class="table-group-number">Group</span>
                    <?php 
                        $curIndex = ($index + 1) % 4;
                        switch ($curIndex) {
                            case 1:
                                $classnum =  "class1";
                                break;
                            case 2:
                                $classnum =  "class2";
                                break;
                            case 3:
                                $classnum =   "class3";
                                break;
                            default:
                                $classnum =   "class4";
                                break;
                        }
                    ?>
                    <span class="table-group-number table-group-number-<?= $classnum ?>"><?= $index + 1?></span>
                </th>
            </tr>
        </thead>
<!-- OUTER T BODY -->
        <tbody class="result-tbody">
            <tr class="result-row result-leader-row">
                <?php foreach ($group as $member) {?>
                    <?php if ($member[2] === "Leader") {?>
                        <td class="result-imgcell">
                            <img class="lead-banner-star" src="assets/images/PixelArt/bannerstar.png" alt="Group Leader Icon">
                        </td>
                        <td class="leader-name-cell result-name-cell result-user-cells">
                            <span class="leader-cell-text"><?= $member[0] ?></span>
                        </td>
                        <td class="leader-type-cell result-type-cell result-user-cells">
                            <span class="leader-cell-text"><?= $member[1] ?></span>
                        </td>
                        <td class="leader-role-cell result-role-cell result-user-cells">
                            <span class="leader-cell-text leader-cell-text-role"><?= $member[2] ?></span>
                        </td>

                        <td>                  
                            <div class="re-move-btn-container">
                                <button onclick="editresultbtn('move')" class="move-btn">Move</button>
                                <button onclick="editresultbtn('remove')" class="remove-btn">Remove</button>
                            </div>

                            <div class="move-to-container">
                                <label>Move to:</label>
                                <select name="move-to" id="move-to">
                                    <?php foreach ($decodedGroup as $index => $group) {?>
                                        <option value="<?= $index + 1?>">Group <?= $index + 1?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>

            <tr class="result-row result-analyst-row">
                <?php foreach ($group as $member) {?>
                    <?php if ($member[2] === "Analyst") {?>
                        <td class="result-imgcell"></td>
                        <td class="analyst-name-cell result-name-cell result-user-cells">
                            <span class="analyst-cell-text"><?= $member[0] ?></span>
                        </td>
                        <td class="analyst-type-cell result-type-cell result-user-cells">
                            <span class="analyst-cell-text"><?= $member[1] ?></span>
                        </td>
                        <td class="analyst-role-cell result-role-cell result-user-cells">
                            <span class="analyst-cell-text analyst-cell-text-role"><?= $member[2] ?></span>
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>

            <tr class="result-row result-programmer-row">
                <?php foreach ($group as $member) {?>
                    <?php if ($member[2] === "Programmer") {?>
                        <td class="result-imgcell"></td>
                        <td class="programmer-name-cell result-name-cell result-user-cells">
                            <span class="programmer-cell-text"><?= $member[0] ?></span>
                        </td>
                        <td class="programmer-type-cell result-type-cell result-user-cells">
                            <span class="programmer-cell-text"><?= $member[1] ?></span>
                        </td>
                        <td class="programmer-role-cell result-role-cell result-user-cells">
                            <span class="programmer-cell-text programmer-cell-text-role"><?= $member[2] ?></span>
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>

            <tr class="result-row result-designer-row">
                <?php foreach ($group as $member) {?>
                    <?php if ($member[2] === "Designer") {?>
                        <td class="result-imgcell"></td>
                        <td class="designer-name-cell result-name-cell result-user-cells">
                            <span class="designer-cell-text"><?= $member[0] ?></span>
                        </td>
                        <td class="designer-type-cell result-type-cell result-user-cells">
                            <span class="designer-cell-text"><?= $member[1] ?></span>
                        </td>
                        <td class="designer-role-cell result-role-cell result-user-cells">
                            <span class="designer-cell-text designer-cell-text-role"><?= $member[2] ?></span>
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>

            <!-- ==================================================================== -->
        </tbody>
    </table>
            <?php }?>
</div>


        <div>
            <form class="hidden-group-form" id="groupings" action="/groups/confirm" method="post">
                <input type="hidden" name="groupsJson" value="<?= htmlspecialchars($encoded) ?>">
                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                <button type="submit">Confirm Groups</button>
            </form>
        </div>





            <div class='class-list'>
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
            </div>


            <section class="groups-table-container">



            </section>
    </main>


    <script src="assets/js/shared-scripts.js"></script>

</body>


</html>