<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem] transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <!-- Header with Back Button -->
        <div class="flex items-center mb-12">
            <a href="/admin-rooms" class="flex items-center justify-center w-10 h-10 mr-4 text-2xl text-white transition-colors duration-200 border rounded-lg bg-blue3 border-black1 hover:bg-blue2">
                ←
            </a>
            <h1 class="text-3xl text-grey2 font-satoshimed">Edit <span class="truncate text-black1"><?= $allRoomInfo['room_name'] ?></span></h1>
        </div>
        
        <div class="flex gap-8">
            <!-- Room Information Section -->
            <div class="w-[40%]">
                <div class="p-8 bg-white border border-black shadow-md rounded-2xl">
                    <form id="editRoomForm" class="space-y-6" method="post" action="/admin-room-edit">
                        <input type="hidden" name="edit">
                        <input type="hidden" name="room_id" value="<?= $allRoomInfo['room_id'] ?>">
                        <input type="hidden" name="encoded_allRoomInfo" value="<?= htmlspecialchars(json_encode($allRoomInfo), ENT_QUOTES, 'UTF-8') ?>">
                        
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">Room Name</label>
                            <input type="text" name="room_name" 
                                   class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                   placeholder="<?= $allRoomInfo['room_name'] ?>">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">Instructor ID</label>
                            <input type="text" name="instructor_id" 
                                   class="w-full h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                   placeholder="<?= $allRoomInfo['school_id'] ?>">
                            <p class="text-xs text-grey2">Enter new Instructor's ID</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-grey2">Room Code</label>
                            <input type="text" name="room_code" 
                                   class="w-1/2 h-12 px-4 transition-colors duration-200 bg-white border rounded-lg border-grey2 focus:border-blue3 focus:outline-none" 
                                   placeholder="<?= $allRoomInfo['room_code'] ?>">
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" 
                                    class="px-6 py-3 text-black transition-colors duration-200 border rounded-xl bg-orangeaccent border-black1 hover:bg-orange-400">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Delete Room Button -->
                <div class="mt-6">
                    <button onclick="confirmDeleteRoom()" 
                            class="w-full px-6 py-3 text-red-600 transition-colors duration-200 border hover:text-white rounded-xl bg-red1 border-black1 hover:bg-red-600">
                        Delete Room
                    </button>
                </div>
            </div>

            <!-- Students Section -->
            <div class="w-[30%] bg-white border border-black rounded-2xl shadow-md overflow-hidden">
                <div class="p-4 bg-blue3">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-white">Students</h2>
                        <span class="px-3 py-1 text-sm text-white rounded-full bg-blue2">
                            <?= is_array($roomStudents) ? count($roomStudents) : 0 ?>
                        </span>
                    </div>
                </div>

                <div class="p-4 border-b border-gray-200">
                    <div class="flex gap-2 mb-4">
                        <input type="text" id="studentSearch" 
                               class="w-2/3 px-3 py-2 border rounded-lg focus:outline-none focus:border-blue3" 
                               placeholder="Search students...">
                        <select id="studentSort" 
                                class="w-1/3 px-3 py-2 border rounded-lg focus:outline-none focus:border-blue3">
                            <option value="name">Sort by Name</option>
                            <option value="id">Sort by ID</option>
                        </select>
                    </div>

                    <form id="addStudentForm" method="post" action="/admin-room-edit" class="flex gap-2">
                        <input type="hidden" name="add_student">
                        <input type="hidden" name="room_id" value="<?= $allRoomInfo['room_id'] ?>">
                        <input type="text" name="student_id" 
                               class="flex-1 px-3 py-2 border rounded-lg focus:outline-none focus:border-blue3" 
                               placeholder="Enter ID to add">
                        <button type="submit" 
                                class="px-4 py-2 text-black transition-colors duration-200 border rounded-lg bg-orangeaccent hover:bg-orange-400">
                            Add
                        </button>
                    </form>
                </div>

                <div id="studentsList" class="overflow-y-auto" style="max-height: calc(40rem - 180px);">
                    <?php if(is_array($roomStudents) && !empty($roomStudents)): ?>
                        <?php foreach($roomStudents as $student): ?>    
                        <div class="p-4 transition-colors duration-200 border-b border-gray-200 student-item hover:bg-gray-50"
                             data-name="<?= strtolower($student['l_name'] . ', ' . $student['f_name']) ?>"
                             data-id="<?= $student['school_id'] ?>">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-medium"><?= $student['l_name']?>, <?= $student['f_name'] ?></h3>
                                    <p class="text-sm text-grey2"><?= $student['school_id'] ?></p>
                                    <p class="text-sm text-grey2"><?= $student['email'] ?></p>
                                </div>
                                <button onclick="confirmRemoveStudent('<?= $student['school_id'] ?>', '<?= $student['f_name'] ?> <?= $student['l_name'] ?>')" 
                                        class="p-2 text-white transition-colors duration-200 rounded-lg bg-red1 hover:bg-red-600">
                                    ×
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="p-4 text-center text-grey2">
                            No students in this room
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Groups Section -->
            <div class="w-[30%] bg-white border border-black rounded-2xl shadow-md overflow-hidden">
                <div class="p-4 bg-blue3">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-white">Groups</h2>
                        <span class="px-3 py-1 text-sm text-white rounded-full bg-blue2">
                            <?= is_array($decoded_roomGroups) ? count($decoded_roomGroups) : 0 ?>
                        </span>
                    </div>
                </div>

                <div class="overflow-y-auto" style="max-height: calc(40rem - 64px);">
                    <?php if(is_array($decoded_roomGroups) && !empty($decoded_roomGroups)): ?>
                        <?php foreach($decoded_roomGroups as $index => $group): ?>
                        <div class="p-4 transition-colors duration-200 border-b border-gray-200 hover:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <h3 class="mb-2 text-lg font-medium">Group <?= $index + 1 ?></h3>
                                    <div class="space-y-1">
                                        <?php foreach($group as $member): ?>
                                        <p class="text-sm text-grey2"><?= $member[0] ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <button onclick="confirmRemoveGroup(<?= $index ?>)" 
                                        class="p-2 text-white transition-colors duration-200 rounded-lg bg-red1 hover:bg-red-600">
                                    ×
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="p-4 text-center text-grey2">
                            No groups created yet
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Keep your existing JavaScript -->
    <script>
        // Adjust main content margin when sidebar is toggled
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            const mainContent = document.getElementById('main-content');
            mainContent.classList.toggle('ml-48');
            mainContent.classList.toggle('ml-20');
        });

        // Search and sort functionality
        document.getElementById('studentSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            filterStudents(searchTerm);
        });

        document.getElementById('studentSort').addEventListener('change', function(e) {
            sortStudents(e.target.value);
        });

        function filterStudents(searchTerm) {
            const students = document.querySelectorAll('.student-item');
            students.forEach(student => {
                const name = student.dataset.name;
                const id = student.dataset.id;
                const visible = name.includes(searchTerm) || id.includes(searchTerm);
                student.style.display = visible ? 'flex' : 'none';
            });
        }

        function sortStudents(criteria) {
            const container = document.getElementById('studentsList');
            const students = Array.from(container.getElementsByClassName('student-item'));
            
            students.sort((a, b) => {
                const aValue = criteria === 'name' ? a.dataset.name : a.dataset.id;
                const bValue = criteria === 'name' ? b.dataset.name : b.dataset.id;
                return aValue.localeCompare(bValue);
            });
            
            students.forEach(student => container.appendChild(student));
        }

        // SweetAlert2 Confirmations
        function confirmRemoveStudent(studentId, studentName) {
            Swal.fire({
                title: 'Remove Student',
                text: `Are you sure you want to remove ${studentName} from this room?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Remove',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'swal-confirm',
                    cancelButton: 'swal-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/admin-room-edit';
                    form.innerHTML = `
                        <input type="hidden" name="remove_student">
                        <input type="hidden" name="room_id" value="<?= $allRoomInfo['room_id'] ?>">
                        <input type="hidden" name="student_id" value="${studentId}">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        function confirmRemoveGroup(groupIndex) {
            Swal.fire({
                title: 'Delete Group',
                text: 'Are you sure you want to delete this group?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'swal-confirm',
                    cancelButton: 'swal-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/admin-room-edit';
                    form.innerHTML = `
                        <input type="hidden" name="remove_group">
                        <input type="hidden" name="room_id" value="<?= $allRoomInfo['room_id'] ?>">
                        <input type="hidden" name="group_index" value="${groupIndex}">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        function confirmDeleteRoom() {
            Swal.fire({
                title: 'Delete Room',
                text: 'Are you sure you want to delete this room? This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'swal-confirm',
                    cancelButton: 'swal-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/admin-room-edit';
                    form.innerHTML = `
                        <input type="hidden" name="delete">
                        <input type="hidden" name="room_id" value="<?= $allRoomInfo['room_id'] ?>">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        // Add success/error alerts if there are messages in the URL
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                const error = urlParams.get('error');
                let errorMessage = '';
                
                switch(error) {
                    case 'student_not_found':
                        errorMessage = 'Student ID not found.';
                        break;
                    case 'student_already_in_room':
                        errorMessage = 'Student is already in this room.';
                        break;
                    default:
                        errorMessage = 'An error occurred.';
                }
                
                Swal.fire({
                    title: 'Error',
                    text: errorMessage,
                    icon: 'error',
                    customClass: {
                        confirmButton: 'swal-confirm'
                    }
                });
            }
        });
    </script>

    <script src="/assets/js/sweetalert2.min.js"></script>
</body>