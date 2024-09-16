<?php if($roomHasGroup):?>
    <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
        <form class="hidden-group-form" id="groupings" action="/groups" method="post">
            <input type="hidden" name="grouped" id="grouped" value="<?= htmlspecialchars($encodedGroup, ENT_QUOTES, 'UTF-8') ?>">
            <input type="hidden" name="room_id" value="<?= $room_id ?>">
            <button type="submit" class="edit-group-btn tabs" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: black; color: beige;"; }?>">Edit Result</button>
        </form>
    <?php endif;?>


<div class="result-header-container">
    <h1 class="result-header" id="groups-result-header" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "color: black;"; }?>">GROUPS FORMED</h1>
    <div class="row-column-container">
        <button class="result-sort result-column-sort" onclick="setFlexDirection('column')" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(33, 252, 158);"; }?>">
            <img src="assets/images/PixelArt/column-purple-transparent.png" alt="Column Sort">
        </button>
        <button class="result-sort result-row-sort" onclick="setFlexDirection('row')" style="<?php if($_SESSION['user']['account_type'] === 'professor'){ echo "background-color: rgb(218, 119, 242)"; }?>">
            <img src="assets/images/PixelArt/row-green-transparent.png" alt="Row Sort">
        </button>
    </div>
</div>

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
<?php else: ?>
    <?php if ($_SESSION['user']['account_type'] === 'professor'):?>
        <div class="not-grouped-container">
            <span class="not-grouped-txt" >You haven't grouped the Class yet!</span>
        </div>
    <?php else: ?>
        <div class="not-grouped-container">
            <span class="not-grouped-txt">The professor hasn't grouped the class yet</span>
        </div>
    <?php endif; ?>
<?php endif; ?>