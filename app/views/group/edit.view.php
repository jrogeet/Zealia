<td>                
    <form action="/groups" method="post">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="group_num" value="<?= $index ?>">
        <input type="hidden" name="member_num" value="<?= $memIndex ?>">

        <input type="hidden" name="encodedGroup" value="<?= htmlspecialchars($encoded, ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="room_id" value="<?= $_POST['room_id'] ?>">


        <div class='move-to-container move-to-container-<?= $index ?>-<?= $memIndex ?>' id="move-to-container-<?= $index ?>-<?= $memIndex ?>" style="display:none;">
            <button type="button" onclick="toggleEditOptions('re-move-btn-container-<?= $index ?>-<?= $memIndex ?>', 'move-to-container-<?= $index ?>-<?= $memIndex ?>')" class="back-btn">Back</button>

        <?php echo "Index: $index, MemIndex: $memIndex"; ?>
            <label for="move-to" class="move-to-label">Move to:</label>
                <select class="move-to-select" name="move-to" id="move-to-<?= $index ?>-<?= $memIndex ?>"  required>
                <option value="" selected disabled>Select a group</option>
                    <?php foreach ($decodedGroup as $idx => $grp) { ?>
                        <option value="<?= $idx ?>" class="move-to-option">Group <?= $idx + 1 ?></option>
                    <?php } ?>
                </select>

                <button type="submit" class="move-btn">Confirm</button>
        </div>

    </form>

    <form action="/groups" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="group_num" value="<?= $index ?>">
        <input type="hidden" name="member_num" value="<?= $memIndex ?>">
        <input type="hidden" name="encodedGroup" value="<?= htmlspecialchars($encoded, ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="room_id" value="<?= $_POST['room_id'] ?>">

        <div class="remove-btn-container remove-btn-container-<?= $index ?>-<?= $memIndex ?>" id="remove-btn-container-<?= $index ?>-<?= $memIndex ?>" style="display:none;">
            <button type="button" onclick="toggleEditOptions('re-move-btn-container-<?= $index ?>-<?= $memIndex ?>', 'remove-btn-container-<?= $index ?>-<?= $memIndex ?>')" class="back-btn">Back</button>
            <label for="remove" class="remove-label">Remove</label>
            <button type="submit" class="remove-btn">Confirm</button>
        </div>
    </form>

    <div class="re-move-btn-container re-move-btn-container-<?= $index ?>-<?= $memIndex ?>" id="re-move-btn-container-<?= $index ?>-<?= $memIndex ?>">
        <button onclick="toggleEditOptions('move-to-container-<?= $index ?>-<?= $memIndex ?>', 're-move-btn-container-<?= $index ?>-<?= $memIndex ?>')" class="move-btn">Move</button>
        <button onclick="toggleEditOptions('remove-btn-container-<?= $index ?>-<?= $memIndex ?>', 're-move-btn-container-<?= $index ?>-<?= $memIndex ?>')" class="remove-btn">Remove</button>
    </div>

    <?php if (isset($errors["cantmove-{$index}-{$memIndex}"])): ?>
        <p class=""><?= $errors["cantmove-{$index}-{$memIndex}"] ?></p>
    <?php endif; ?>
</td>