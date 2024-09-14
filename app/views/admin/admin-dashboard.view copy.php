<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css"  href="assets/css/admin/admin-dashboard.css">
</head>
<style>
    <?php 
        include base_path('public/assets/css/shared-styles.css');
    ?>
</style>
<body>
    <?php // dd($professors);?>
    <nav class="admin-nav-tabs">
        <div class="title-container">
            <a class="menu-title-anchor" href="/admin">
                <span class="menu-title title-text">A
                    <span class="title-text title-span mbti-m">M</span>
                    <span class="title-text title-span mbti-b">B</span>
                    I
                    <span class="title-text title-span mbti-t">T</span>
                    <span class="title-text title-span mbti-i">I</span>
                    O N
                </span>
            </a>
            <span>Admin</span>
        </div>

        <ul class="admin-nav-tabs-ul">
            <li class="admin-nav-tabs-li">
                <a onclick="adminTabs('dashboard')" class="admin-nav-tabs-a">Dashboard</a>
            </li>
            <li class="admin-nav-tabs-li">
                <a onclick="adminTabs('accounts')" class="admin-nav-tabs-a">Accounts</a>
            </li>
            <li class="admin-nav-tabs-li">
                <a onclick="adminTabs('rooms')" class="admin-nav-tabs-a">Rooms</a>
            </li>
            <li class="admin-nav-tabs-li">
                <a onclick="adminTabs('submit-ticket')" class="admin-nav-tabs-a">Tickets</a>
            </li>
            <li class="admin-nav-tabs-li">
                <a onclick="adminTabs('logs')" class="admin-nav-tabs-a">Logs</a>
            </li>
            <li class="admin-nav-tabs-li">
                <a onclick="adminTabs('my-account')" class="admin-nav-tabs-a">My Account</a>
            </li>
            <li class="admin-nav-tabs-li">
                <a href="/" class="admin-nav-tabs-a">User Page</a>
            </li>
        </ul>
    </nav>

    <main>
        <div class="dashboard-container">
            <!-- UPPER -->
            <div class="accounts-global-count">
                <div onclick="adminTabs('accounts')" class="accounts-count-total-wrap">
                    <span class="accounts-count-total-title count-total-title">Total No. of Accounts: </span>
                    <span class="accounts-count-total-number count-total-number">
                        <?= count($accounts) ?>
                    </span>
                </div>

                <div class="stuprof-count-total-wrap">
                    <div onclick="adminTabs('accounts')" class="students-count-total-wrap">
                        <span class="students-count-total-title count-total-title">Total No. of Students: </span>
                        <span class="students-count-total-number count-total-number">
                            <?= count($students) ?> 
                        </span>
                    </div>

                    <div onclick="adminTabs('accounts')" class="professors-count-total-wrap">
                        <span class="professors-count-total-title count-total-title">Total No. of Professors: </span>
                        <span class="professors-count-total-number count-total-number">
                            <?= count($professors) ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- LOWER -->

            <div class="recents-container">
                <div onclick="adminTabs('accounts')" class="accounts-recents">
                    <span class="accounts-recents-title">Recently Created Accounts</span>
                    <table class="gen-table">
                        <thead class="gen-thead">
                            <tr class="gen-thead-tr gen-tr">
                                <th class="gen-th">School ID</th>
                                <th class="gen-th">Name</th>
                                <th class="gen-th">Email</th>
                                <th class="gen-th">Type</th>
                                <th class="gen-th">Registered from</th>
                                <th class="gen-th">Activation</th>
                            </tr>
                        </thead>

                        <tbody class="gen-tbody">
                            <?php foreach($recentAccounts as $account) {?> 
                                <tr class="gen-tbody-tr gen-tr">
                                    <td class="gen-td"><?= $account['school_id'] ?></td>
                                    <td class="gen-td"><?= $account['l_name'] ?>, <?= $account['f_name'] ?></td>
                                    <td class="gen-td"><?= $account['email'] ?></td>
                                    <td class="gen-td"><?= $account['account_type'] ?></td>
                                    <td class="gen-td"><?= $account['daysAgo'] ?> days, <?= $account['hoursAgo'] ?> hours, <?= $account['minutesAgo'] ?> minutes ago</td>
                                    <td class="gen-td">
                                        <?php if(isset($account['account_activation_hash'])): ?>
                                                <span>Not Yet Activated</span>
                                        <?php else:?>
                                                <span>Already Activated</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>

                <div onclick="adminTabs('rooms')" class="rooms-recents">
                    <span class="rooms-recents-title">Recently Created Rooms</span>
                    <table class="gen-table">
                        <thead class="gen-thead">
                            <tr class="gen-thead-tr gen-tr">
                                <th class="gen-th">Room ID</th>
                                <th class="gen-th">Room Name</th>
                                <th class="gen-th">Professor Name</th>
                                <th class="gen-th">Professor ID</th>
                                <th class="gen-th">Room Code</th>
                                <th class="gen-th">Created from</th>
                            </tr>
                        </thead>

                        <tbody class="gen-tbody">
                            <?php foreach($recentRooms as $room) { ?>
                                <tr class="gen-tbody-tr gen-tr">
                                    <td class="gen-td"><?= $room['room_id'] ?></td>
                                    <td class="gen-td"><?= $room['room_name'] ?></td>
                                    <?php foreach($professors as $professor) { ?>
                                        <?php if($professor['school_id'] == $room['school_id']) { ?>
                                            <td class="gen-td"><?= $professor['f_name'] . ' ' . $professor['l_name'] ?></td>
                                        <?php } ?>
                                    <?php } ?>
                                    <td class="gen-td"><?= $room['school_id'] ?></td>
                                    <td class="gen-td"><?= $room['room_code'] ?></td>
                                    <td class="gen-td"><?= $room['daysAgo'] ?> days, <?= $room['hoursAgo'] ?> hours, <?= $room['minutesAgo'] ?> minutes ago</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- ACCOUNT LIST -->

        
        <div class="accounts-list">
            <div class="accounts-list-container">
                <div class="accounts-list-header">
                    <h1 class="accounts-list-title">Accounts</h1> 

                    <span class="users-count-display">Total No. of Users: <?= count($accounts) ?></span>

                    <div class="tabs-container">
                        <div class="room-tabs">
                            <button onclick="toggleAdminEditOptions('students-accounts-container', 'professors-accounts-container')"  class='student-btn inner-admin-tabs'>
                                <span class="tabs-text">Students</span>
                            </button>

                            <button onclick="toggleAdminEditOptions('professors-accounts-container', 'students-accounts-container')"  class='professor-btn inner-admin-tabs'>
                                <span class="tabs-text">Professors</span>
                            </button>
                        </div>   
                    </div>
                </div>


                <div class="students-accounts-container" id="students-accounts-container">
                    <span class="students">Students</span>
                    <table class="gen-table" id="students-accounts-table">
                        <thead class="gen-thead">
                            <tr class="gen-thead-tr gen-tr">
                                <th class="gen-th">School ID</th>
                                <th class="gen-th">Last Name</th>
                                <th class="gen-th">First Name</th>
                                <th class="gen-th">Personality Type</th>
                                <th class="gen-th">Email</th>
                                <th class="gen-th">Password</th>
                                <th class="gen-th">Registration Date</th>
                                <th class="gen-th">Activation</th>
                            </tr>
                        </thead>

                        <tbody class="gen-tbody">
                            <?php foreach($students as $student) {?> 
                                <tr class="gen-tbody-tr gen-tr">
                                <td class="gen-td">
                                        <a class="a-<?= $student['school_id'] ?>" id="a-<?= $student['school_id'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $student['school_id'] ?>', 'a-<?= $student['school_id'] ?>')">
                                            <?= $student['school_id'] ?>
                                        </a>

                                        <div class="edit-options-<?= $student['school_id'] ?>" id="edit-options-<?= $student['school_id'] ?>" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $student['school_id'] ?>', 'edit-options-<?= $student['school_id'] ?>')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                <input type="number" name="new_school_id" placeholder="<?= $student['school_id'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $student['school_id'] ?>', 'edit-options-<?= $student['school_id'] ?>')">Confirm</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                        <a class="a-<?= $student['l_name'] ?>" id="a-<?= $student['l_name'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $student['l_name'] ?>', 'a-<?= $student['l_name'] ?>')">
                                            <?= $student['l_name'] ?>
                                        </a>

                                        <div class="edit-options-<?= $student['l_name'] ?>" id="edit-options-<?= $student['l_name'] ?>" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $student['l_name'] ?>', 'edit-options-<?= $student['l_name'] ?>')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="l_name" value="<?= $student['l_name'] ?>">
                                                <input type="text" name="new_l_name" placeholder="<?= $student['l_name'] ?>">
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $student['l_name'] ?>', 'edit-options-<?= $student['l_name'] ?>')">Confirm</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                    <a class="a-<?= $student['f_name'] ?>" id="a-<?= $student['f_name'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $student['f_name'] ?>', 'a-<?= $student['f_name'] ?>')">
                                            <?= $student['f_name'] ?>
                                        </a>

                                        <div class="edit-options-<?= $student['f_name'] ?>" id="edit-options-<?= $student['f_name'] ?>" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $student['f_name'] ?>', 'edit-options-<?= $student['f_name'] ?>')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="f_name" value="<?= $student['f_name'] ?>">
                                                <input type="text" name="new_f_name" placeholder="<?= $student['f_name'] ?>">
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $student['f_name'] ?>', 'edit-options-<?= $student['f_name'] ?>')">Confirm</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                        <a class="a-<?= $student['school_id'] ?>-pt" id="a-<?= $student['school_id'] ?>-pt" onclick="toggleAdminEditOptions('edit-options-<?= $student['school_id'] ?>-pt', 'a-<?= $student['school_id'] ?>-pt')">
                                            <?php if (is_null($student['personality_type'])) {
                                                echo 'N/A';
                                            } elseif (!is_null($student['personality_type']))
                                                echo $student['personality_type'];
                                            ?>
                                        </a>

                                        <div class="edit-options-<?= $student['school_id'] ?>-pt" id="edit-options-<?= $student['school_id'] ?>-pt" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $student['school_id'] ?>-pt', 'edit-options-<?= $student['school_id'] ?>-pt')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                    <label for="personality_type">Select MBTI Type</label>
                                                    <select name="personality_type" id="reason" placeholder="Select Category" required>
                                                        <option value="INFJ">INFJ</option>
                                                        <option value="INTJ">INTJ</option>
                                                        <option value="INTP">INTP</option>
                                                        <option value="INFP">INFP</option>
                                                        <option value="ISTJ">ISTJ</option>
                                                        <option value="ISTP">ISTP</option>
                                                        <option value="ISFJ">ISFJ</option>
                                                        <option value="ISFP">ISFP</option>
                                                        <option value="ENTJ">ENTJ</option>
                                                        <option value="ENTP">ENTP</option>
                                                        <option value="ENFJ">ENFJ</option>
                                                        <option value="ENFP">ENFP</option>
                                                        <option value="ESTJ">ESTJ</option>
                                                        <option value="ESTP">ESTP</option>
                                                        <option value="ESFJ">ESFJ</option>
                                                        <option value="ESFP">ESFP</option>
                                                    </select>
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $student['school_id'] ?>-pt', 'edit-options-<?= $student['school_id'] ?>-pt')">Edit</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                        <a class="a-<?= $student['school_id'] ?>-e" id="a-<?= $student['school_id'] ?>-e" onclick="toggleAdminEditOptions('edit-options-<?= $student['school_id'] ?>-e', 'a-<?= $student['school_id'] ?>-e')">
                                            <?= $student['email'] ?>
                                        </a>

                                        <div class="edit-options-<?= $student['school_id'] ?>-e" id="edit-options-<?= $student['school_id'] ?>-e" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $student['school_id'] ?>-e', 'edit-options-<?= $student['school_id'] ?>-e')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                <input type="email" name="new_email" placeholder="<?= $student['email'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $student['school_id'] ?>-e', 'edit-options-<?= $student['school_id'] ?>-e')">Edit</button>
                                            </form>
                                        </div>
                                    </td>



                                    <td class="gen-td">
                                        <button class="changepass-btn" id="changepass-<?= $student['school_id'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $student['school_id'] ?>-p', 'changepass-<?= $student['school_id'] ?>')">Change Password</button>
                                        <div class="edit-options-<?= $student['school_id'] ?>-p" id="edit-options-<?= $student['school_id'] ?>-p" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('changepass-<?= $student['school_id'] ?>', 'edit-options-<?= $student['school_id'] ?>-p')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                <input type="password" name="new_password" placeholder="New Password" required>
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('changepass-<?= $student['school_id'] ?>', 'edit-options-<?= $student['school_id'] ?>-p')">Edit</button>
                                            </form>
                                        </div>
                                    
                                    </td>
                                    <td class="gen-td"><?= $student['reg_date'] ?></td>
                                    <td class="gen-td">
                                        <?php if(isset($student['account_activation_hash'])): ?>
                                            <form action="/admin" method="post">   
                                                <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                <input type="hidden" name="activate" value="activate">
                                                <button class="activation-btn">Activate</button>
                                            </form>
                                        <?php else:?>
                                                <span>Already Activated</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php }?>
                        </tbody>
                    </table>
                </div>

                <div class="professors-accounts-container" id="professors-accounts-container" style="display: none;">
                    <span class="professors">Professors</span>
                    <table class="gen-table" id="professors-accounts-table">
                        <thead class="gen-thead">
                            <tr class="gen-thead-tr gen-tr">
                                <th class="gen-th">School ID</th>
                                <th class="gen-th">Last Name</th>
                                <th class="gen-th">First Name</th>
                                <th class="gen-th">Personality Type</th>
                                <th class="gen-th">Email</th>
                                <th class="gen-th">Password</th>
                                <th class="gen-th">Registration Date</th>
                                <th class="gen-th">Activation</th>
                            </tr>
                        </thead>

                        <tbody class="gen-tbody">
                            <?php foreach($professors as $professor) {?> 
                                <tr class="gen-tbody-tr gen-tr">
                                    <td class="gen-td">
                                        <a class="a-<?= $professor['school_id'] ?>" id="a-<?= $professor['school_id'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $professor['school_id'] ?>', 'a-<?= $professor['school_id'] ?>')">
                                            <?= $professor['school_id'] ?>
                                        </a>

                                        <div class="edit-options-<?= $professor['school_id'] ?>" id="edit-options-<?= $professor['school_id'] ?>" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $professor['school_id'] ?>', 'edit-options-<?= $professor['school_id'] ?>')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                <input type="number" name="new_school_id" placeholder="<?= $professor['school_id'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $professor['school_id'] ?>', 'edit-options-<?= $professor['school_id'] ?>')">Confirm</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                        <a class="a-<?= $professor['l_name'] ?>" id="a-<?= $professor['l_name'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $professor['l_name'] ?>', 'a-<?= $professor['l_name'] ?>')">
                                            <?= $professor['l_name'] ?>
                                        </a>

                                        <div class="edit-options-<?= $professor['l_name'] ?>" id="edit-options-<?= $professor['l_name'] ?>" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $professor['l_name'] ?>', 'edit-options-<?= $professor['l_name'] ?>')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="l_name" value="<?= $professor['l_name'] ?>">
                                                <input type="text" name="new_l_name" placeholder="<?= $professor['l_name'] ?>">
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $professor['l_name'] ?>', 'edit-options-<?= $professor['l_name'] ?>')">Confirm</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                    <a class="a-<?= $professor['f_name'] ?>" id="a-<?= $professor['f_name'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $professor['f_name'] ?>', 'a-<?= $professor['f_name'] ?>')">
                                            <?= $professor['f_name'] ?>
                                        </a>

                                        <div class="edit-options-<?= $professor['f_name'] ?>" id="edit-options-<?= $professor['f_name'] ?>" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $professor['f_name'] ?>', 'edit-options-<?= $professor['f_name'] ?>')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="f_name" value="<?= $professor['f_name'] ?>">
                                                <input type="text" name="new_f_name" placeholder="<?= $professor['f_name'] ?>">
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $professor['f_name'] ?>', 'edit-options-<?= $professor['f_name'] ?>')">Confirm</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                        <a class="a-<?= $professor['school_id'] ?>-pt" id="a-<?= $professor['school_id'] ?>-pt" onclick="toggleAdminEditOptions('edit-options-<?= $professor['school_id'] ?>-pt', 'a-<?= $professor['school_id'] ?>-pt')">
                                            <?php if (is_null($professor['personality_type'])) {
                                                echo 'N/A';
                                            } elseif (!is_null($professor['personality_type']))
                                                echo $professor['personality_type'];
                                            ?>
                                        </a>

                                        <div class="edit-options-<?= $professor['school_id'] ?>-pt" id="edit-options-<?= $professor['school_id'] ?>-pt" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $professor['school_id'] ?>-pt', 'edit-options-<?= $professor['school_id'] ?>-pt')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                    <label for="personality_type">Select MBTI Type</label>
                                                    <select name="personality_type" id="reason" placeholder="Select Category" required>
                                                        <option value="INFJ">INFJ</option>
                                                        <option value="INTJ">INTJ</option>
                                                        <option value="INTP">INTP</option>
                                                        <option value="INFP">INFP</option>
                                                        <option value="ISTJ">ISTJ</option>
                                                        <option value="ISTP">ISTP</option>
                                                        <option value="ISFJ">ISFJ</option>
                                                        <option value="ISFP">ISFP</option>
                                                        <option value="ENTJ">ENTJ</option>
                                                        <option value="ENTP">ENTP</option>
                                                        <option value="ENFJ">ENFJ</option>
                                                        <option value="ENFP">ENFP</option>
                                                        <option value="ESTJ">ESTJ</option>
                                                        <option value="ESTP">ESTP</option>
                                                        <option value="ESFJ">ESFJ</option>
                                                        <option value="ESFP">ESFP</option>
                                                    </select>
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $professor['school_id'] ?>-pt', 'edit-options-<?= $professor['school_id'] ?>-pt')">Edit</button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="gen-td">
                                        <a class="a-<?= $professor['school_id'] ?>-e" id="a-<?= $professor['school_id'] ?>-e" onclick="toggleAdminEditOptions('edit-options-<?= $professor['school_id'] ?>-e', 'a-<?= $professor['school_id'] ?>-e')">
                                            <?= $professor['email'] ?>
                                        </a>

                                        <div class="edit-options-<?= $professor['school_id'] ?>-e" id="edit-options-<?= $professor['school_id'] ?>-e" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('a-<?= $professor['school_id'] ?>-e', 'edit-options-<?= $professor['school_id'] ?>-e')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                <input type="email" name="new_email" placeholder="<?= $professor['email'] ?>">
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $professor['school_id'] ?>-e', 'edit-options-<?= $professor['school_id'] ?>-e')">Edit</button>
                                            </form>
                                        </div>
                                    </td>



                                    <td class="gen-td">
                                        <button class="changepass-btn" id="changepass-<?= $professor['school_id'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $professor['school_id'] ?>-p', 'changepass-<?= $professor['school_id'] ?>')">Change Password</button>
                                        <div class="edit-options-<?= $professor['school_id'] ?>-p" id="edit-options-<?= $professor['school_id'] ?>-p" style="display:none;">
                                            <button onclick="toggleAdminEditOptions('changepass-<?= $professor['school_id'] ?>', 'edit-options-<?= $professor['school_id'] ?>-p')">Back</button>
                                            <form action="/admin" method="post">
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                <input type="password" name="new_password" placeholder="New Password" required>
                                                <input type="hidden" name="edit" value="edit">
                                                <button class="edit-btn" onclick="toggleAdminEditOptions('changepass-<?= $professor['school_id'] ?>', 'edit-options-<?= $professor['school_id'] ?>-p')">Edit</button>
                                            </form>
                                        </div>
                                    
                                    </td>

                                    <td class="gen-td"><?= $professor['reg_date'] ?></td>
                                    <td class="gen-td">
                                        <?php if(isset($professor['account_activation_hash'])): ?>
                                            <form action="/admin" method="post">   
                                                <input type="hidden" name="school_id" value="<?= $professor['school_id'] ?>">
                                                <input type="hidden" name="activate" value="activate">
                                                <button class="activation-btn">Activate</button>
                                            </form>
                                        <?php else:?>
                                                <span>Already Activated</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                
  
                            <?php }?>
                        </tbody>
                        </table>
                        </div>
                    
                        <div class="rooms-list" id="rooms-list">
                        <span class="rooms">Rooms</span>
                        <table class="gen-table" id="rooms-table">
                            <thead class="gen-thead">
                                <tr class="gen-thead-tr gen-tr">
                                    <th class="gen-th">Room ID</th>
                                    <th class="gen-th">Room Name</th>
                                    <th class="gen-th">Room Code</th>
                                    <th class="gen-th">Professor Name</th>
                                    <th class="gen-th">Professor ID</th>
                                    
                                </tr>
                            </thead>

                            <tbody class="gen-tbody">
                                <?php foreach($rooms as $room) {?> 
                                    <tr class="gen-tbody-tr gen-tr">
                                    <td class="gen-td">
                                            <a class="a-<?= $room['room_id'] ?>" id="a-<?= $room['room_id'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $room['room_id'] ?>', 'a-<?= $room['room_id'] ?>')">
                                                <?= $room['room_id'] ?>
                                            </a>

                                            <div class="edit-options-<?= $room['room_id'] ?>" id="edit-options-<?= $room['room_id'] ?>" style="display:none;">
                                                <button onclick="toggleAdminEditOptions('a-<?= $room['room_id'] ?>', 'edit-options-<?= $room['room_id'] ?>')">Back</button>
                                                <form action="/admin" method="post">
                                                    <input type="hidden" name="room_id" value="<?= $room['room_id'] ?>">
                                                    <input type="number" name="new_room_id" placeholder="<?= $room['room_id'] ?>">
                                                    <input type="hidden" name="edit" value="edit">
                                                    <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $room['room_id'] ?>', 'edit-options-<?= $room['room_id'] ?>')">Confirm</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="gen-td">
                                            <a class="a-<?= $room['room_name'] ?>" id="a-<?= $room['room_name'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $room['room_name'] ?>', 'a-<?= $room['room_name'] ?>')">
                                                <?= $room['room_name'] ?>
                                            </a>

                                            <div class="edit-options-<?= $room['room_name'] ?>" id="edit-options-<?= $room['room_name'] ?>" style="display:none;">
                                                <button onclick="toggleAdminEditOptions('a-<?= $room['room_name'] ?>', 'edit-options-<?= $room['room_name'] ?>')">Back</button>
                                                <form action="/admin" method="post">
                                                    <input type="hidden" name="room_name" value="<?= $room['room_name'] ?>">
                                                    <input type="text" name="new_room_name" placeholder="<?= $room['room_name'] ?>">
                                                    <input type="hidden" name="room_id" value="<?= $room['room_id'] ?>">
                                                    <input type="hidden" name="edit" value="edit">
                                                    <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $room['room_name'] ?>', 'edit-options-<?= $room['room_name'] ?>')">Confirm</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="gen-td">
                                        <a class="a-<?= $room['room_code'] ?>" id="a-<?= $room['room_code'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $room['room_code'] ?>', 'a-<?= $room['room_code'] ?>')">
                                                <?= $room['room_code'] ?>
                                            </a>

                                            <div class="edit-options-<?= $room['room_code'] ?>" id="edit-options-<?= $room['room_code'] ?>" style="display:none;">
                                                <button onclick="toggleAdminEditOptions('a-<?= $room['room_code'] ?>', 'edit-options-<?= $room['room_code'] ?>')">Back</button>
                                                <form action="/admin" method="post">
                                                    <input type="hidden" name="room_code" value="<?= $room['room_code'] ?>">
                                                    <input type="text" name="new_room_code" placeholder="<?= $room['room_code'] ?>">
                                                    <input type="hidden" name="school_id" value="<?= $room['room_id'] ?>">
                                                    <input type="hidden" name="edit" value="edit">
                                                    <button class="edit-btn" onclick="toggleAdminEditOptions('a-<?= $room['room_code'] ?>', 'edit-options-<?= $room['room_code'] ?>')">Confirm</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td class="gen-td">
                                            <a class="a-room-prof-name-<?= $room['room_id'] ?>" id="a-room-prof-name-<?= $room['room_id'] ?>">
                                            <?php foreach($professors as $professor) {?>
                                                <?php if($professor['school_id'] == $room['school_id']) {?>
                                                    <td class="gen-td"><?= $professor['f_name'] . ' ' . $professor['l_name'] ?></td>
                                                <?php }?>
                                            <?php }?>
                                            </a>
                                        </td>

                                        <td class="gen-td">
                                            <a class="a-<?= $room['room_id'] ?>-prof-id" id="a-<?= $room['room_id'] ?>-prof-id">
                                                <?= $room['school_id'] ?>
                                            </a>
                                        </td>



                                        <td class="gen-td">
                                            <button class="changepass-btn" id="changepass-<?= $student['school_id'] ?>" onclick="toggleAdminEditOptions('edit-options-<?= $student['school_id'] ?>-p', 'changepass-<?= $student['school_id'] ?>')">Change Password</button>
                                            <div class="edit-options-<?= $student['school_id'] ?>-p" id="edit-options-<?= $student['school_id'] ?>-p" style="display:none;">
                                                <button onclick="toggleAdminEditOptions('changepass-<?= $student['school_id'] ?>', 'edit-options-<?= $student['school_id'] ?>-p')">Back</button>
                                                <form action="/admin" method="post">
                                                    <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                    <input type="password" name="new_password" placeholder="New Password" required>
                                                    <input type="hidden" name="edit" value="edit">
                                                    <button class="edit-btn" onclick="toggleAdminEditOptions('changepass-<?= $student['school_id'] ?>', 'edit-options-<?= $student['school_id'] ?>-p')">Edit</button>
                                                </form>
                                            </div>
                                        
                                        </td>
                                        <td class="gen-td"><?= $student['reg_date'] ?></td>
                                        <td class="gen-td">
                                            <?php if(isset($student['account_activation_hash'])): ?>
                                                <form action="/admin" method="post">   
                                                    <input type="hidden" name="school_id" value="<?= $student['school_id'] ?>">
                                                    <input type="hidden" name="activate" value="activate">
                                                    <button class="activation-btn">Activate</button>
                                                </form>
                                            <?php else:?>
                                                    <span>Already Activated</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                <?php }?>
                            </tbody>
                        </table>
                </div>
                

        <div class="submit-ticket-container" id="submit-ticket-container">
            <h1 class="submit-ticket-title">Submit Ticket</h1>
            <table class="gen-table accounts-recents-table">
                <thead class="gen-thead">
                    <tr class="gen-thead-tr gen-tr">
                        <th class="gen-th">Ticket ID</th>
                        <th class="gen-th">Reason</th>
                        <th class="gen-th">First Name</th>
                        <th class="gen-th">Last Name</th>
                        <th class="gen-th">School ID</th>
                        <th class="gen-th">Email</th>
                    </tr>
                </thead>

                <tbody class="gen-tbody">
                    <?php foreach($tickets as $ticket) {?>
                        <tr class="gen-tbody-tr gen-tr">
                            <td class="gen-td"><?= $ticket['ticket_id'] ?></td>
                            <td class="gen-td"><?= $ticket['f_name'] ?></td>
                            <td class="gen-td"><?= $ticket['l_name'] ?></td>
                            <td class="gen-td"><?= $ticket['year_section'] ?></td>
                            <td class="gen-td"><?= $ticket['school_id'] ?></td>
                            <td class="gen-td"><?= $ticket['category'] ?></td>
                            <td class="gen-td"><?= $ticket['email'] ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="logs-container" id="logs-container" style="display: none;">
            <h1 class="logs-title">Logs</h1>
            <table class="gen-table">
                <thead class="gen-thead">
                    <tr class="gen-thead-tr gen-tr">
                        <th class="gen-th">Log ID</th>
                        <th class="gen-th">Action Type</th>
                        <th class="gen-th">Description</th>
                        <th class="gen-th">School ID</th>
                        <th class="gen-th">Resource</th>
                        <th class="gen-th">Status</th>
                        <th class="gen-th">Timestamp</th>
                        <th class="gen-th">IP Address</th>
                    </tr>
                </thead>

                <tbody class="gen-tbody">
                    <?php foreach($logs as $log) {?>
                        <tr class="gen-tbody-tr gen-tr">
                            <td class="gen-td"><?= $log['id'] ?></td>
                            <td class="gen-td"><?= $log['action_type'] ?></td>
                            <td class="gen-td"><?= $log['description'] ?></td>
                            <td class="gen-td"><?= $log['school_id'] ?></td>
                            <td class="gen-td"><?= $log['resource'] ?></td>
                            <td class="gen-td"><?= $log['status'] ?></td>
                            <td class="gen-td"><?= $log['timestamp'] ?></td>
                            <td class="gen-td"><?= $log['ip_address'] ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        
        <div class="my-account" id="my-account">
            <h1>My account</h1>
        </div>
    </main>

    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>