<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center overflow-x-hidden bg-beige">
    <?php view('partials/nav.view.php')?>

    <main class="h-auto min-h-[40rem] w-[80rem] mt-20">
    <?php // dd($group); ?>
        <div class="flex justify-between mt-20">
            <!-- GROUP -->
            <div class="bg-white h-auto max-w-[22rem]  border rounded-lg flex flex-col overflow-hidden">
                <!-- Group Head -->
                <div class="flex items-center justify-center w-full h-10 bg-blackpri ">
                    <span class="text-4xl text-white font-satoshimed">Group</span>
                    <span class="ml-2 text-4xl font-clashbold text-greenaccent"><?= $_GET['group'] + 1 ?>:</span>
                </div>

                <!-- Group Body -->
                <div class="w-full">
                    <!-- Each Member -->
                    <?php foreach ($group as $member) {?>
                    <div class="bg-whitecon h-[6.22875rem] w-full flex">
                        <span class="flex items-center w-6/12 p-1 text-xl break-all border border-blackpri font-satoshimed"><?= $member[0] ?></span>
                        <span class="w-6/12  border border-blackpri <?php if($member[2] === 'Principal Investigator') { echo 'text-blue3'; } else { echo 'text-blackpri'; }?> flex justify-center items-center p-1 font-satoshimed text-xl "><?= $member[2] ?></span>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- TABLE HISTORY -->
            <div class="flex flex-col justify-between w-8/12 h-5/6">
                <span class="text-3xl text-center font-clashmed text-blackpri">Group Transfers History:</span>
                <!-- Added wrapper div for table scrolling -->
                <div class="flex-1 overflow-y-auto">
                    <table class="w-full border border-black table-auto rounded-xl">
                        <thead class="sticky top-0">
                            <tr>
                                <th class="px-0 py-3 text-xs tracking-wider text-center uppercase border-l border-r border-white bg-blackpri font-satoshiblack text-blue1">Timestamp</th>
                                <th class="px-0 py-3 text-xs tracking-wider text-center uppercase border-l border-r border-white bg-blackpri font-satoshiblack text-greenaccent">Name</th>
                                <th class="px-0 py-3 text-xs tracking-wider text-center uppercase border-l border-r border-white bg-blackpri font-satoshiblack text-blue1">From Group</th>
                                <th class="px-0 py-3 text-xs tracking-wider text-center uppercase border-l border-r border-white bg-blackpri font-satoshiblack text-greenaccent">To Group</th>
                                <th class="px-0 py-3 text-xs tracking-wider text-center uppercase border-l border-r border-white bg-blackpri font-satoshiblack text-greenaccent">Reason</th>
                            </tr>
                        </thead>
                        <tbody class="bg-beige">
                            <?php if(! empty($groupHistory)): ?>
                                <?php foreach($groupHistory as $history): ?>
                                <tr>
                                    <td class="p-5 text-sm text-center bg-white border-b border-l border-r border-gray-200 border-blackless">
                                        <?= date('M j, Y g:i A', strtotime($history['timestamp'])) ?>
                                    </td>
                                    <td class="p-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200 font-satoshiblack">
                                        <?= $history['name'] ?? 'Data not available' ?>
                                    </td>
                                    <td class="p-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200 font-satoshimed text-grey2"><?= $history['from_group'] ?></td>
                                    <td class="p-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200 font-satoshimed text-blue3"><?= $history['to_group'] ?></td>
                                    <td class="p-5 text-sm text-center bg-white border-b border-l border-r border-black border-gray-200 font-satoshimed"><?= $history['reason'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5"  class="p-5 text-2xl text-center bg-white border-b border-l border-r border-black border-gray-200 font-satoshimed">Nothing occured to this group yet.</td>
                                </tr>
                            <?php endif; ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="w-full mt-10 mb-20 border-black rounded-lg min-h-20">
            <h2 class="text-2xl font-satoshimed">Tasks</h2>
            <div class="mt-4">
                <!-- Tabs Navigation -->
                <div class="flex mt-4 border-b border-blackpri">
                    <button class="px-4 py-2 text-lg bg-white border-t border-l border-r rounded-t-lg font-satoshimed text-blackpri border-blackpri tab active" data-tab="todo">
                        Todo
                    </button>
                    <button class="px-4 py-2 text-lg bg-white border-t border-l border-r rounded-t-lg font-satoshimed text-blackpri border-blackpri tab" data-tab="wip">
                        Work in Progress
                    </button>
                    <button class="px-4 py-2 text-lg bg-white border-t border-l border-r rounded-t-lg font-satoshimed text-blackpri border-blackpri tab" data-tab="done">
                        Done
                    </button>
                    <button class="px-4 py-2 text-lg bg-white border-t border-l border-r rounded-t-lg font-satoshimed text-blackpri border-blackpri tab" data-tab="past-due">
                        Past Due
                    </button>
                </div>

                <?php 
                $today = date('Y-m-d');
                $roomId = $_GET['room_id'];
                
                // Collect all tasks across members
                $allTasks = [
                    'todo' => [],
                    'wip' => [],
                    'done' => []
                ];
                
                // Gather all tasks and attach member names
                foreach ($group as $member) {
                    if (!empty($member[3])) {
                        $tasks = json_decode($member[3], true);
                        if (isset($tasks[$roomId])) {
                            foreach ($tasks[$roomId] as $status => $taskList) {
                                foreach ($taskList as $task) {
                                    // Add member name to task array
                                    $task[] = $member[0]; // Add member name as last element
                                    $allTasks[$status][] = $task;
                                }
                            }
                        }
                    }
                }
                ?>

                <!-- Todo Tab -->
                <div class="tab-content active" id="todo-content">
                    <div class="p-4 space-y-2">
                        <?php foreach ($allTasks['todo'] as $task): ?>
                            <?php if ($task[2] >= $today): // Only show non-past due tasks ?>
                                <div class="p-4 bg-white border-l-4 rounded-lg shadow-sm border-blue3">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h4 class="font-satoshimed text-blackpri"><?= htmlspecialchars($task[0]) ?></h4>
                                            <p class="text-grey2"><?= htmlspecialchars($task[1]) ?></p>
                                            <p class="mt-2 text-sm font-satoshimed text-blue3">Assigned to: <?= htmlspecialchars($task[3]) ?></p>
                                        </div>
                                        <span class="text-sm text-grey2">Due: <?= date('M j, Y', strtotime($task[2])) ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- WIP Tab -->
                <div class="hidden tab-content" id="wip-content">
                    <div class="p-4 space-y-2">
                        <?php foreach ($allTasks['wip'] as $task): ?>
                            <div class="p-4 bg-white border-l-4 rounded-lg shadow-sm border-greenaccent">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="font-satoshimed text-blackpri"><?= htmlspecialchars($task[0]) ?></h4>
                                        <p class="text-grey2"><?= htmlspecialchars($task[1]) ?></p>
                                        <p class="mt-2 text-sm font-satoshimed text-greenaccent">Assigned to: <?= htmlspecialchars($task[3]) ?></p>
                                    </div>
                                    <span class="text-sm text-grey2">Due: <?= date('M j, Y', strtotime($task[2])) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Done Tab -->
                <div class="hidden tab-content" id="done-content">
                    <div class="p-4 space-y-2">
                        <?php foreach ($allTasks['done'] as $task): ?>
                            <div class="p-4 bg-white border-l-4 rounded-lg shadow-sm border-blackpri">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h4 class="font-satoshimed text-blackpri"><?= htmlspecialchars($task[0]) ?></h4>
                                        <p class="text-grey2"><?= htmlspecialchars($task[1]) ?></p>
                                        <p class="mt-2 text-sm font-satoshimed">Completed by: <?= htmlspecialchars($task[3]) ?></p>
                                    </div>
                                    <span class="text-sm text-grey2">Completed: <?= date('M j, Y', strtotime($task[2])) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Past Due Tab -->
                <div class="hidden tab-content" id="past-due-content">
                    <div class="p-4 space-y-2">
                        <?php foreach ($allTasks['todo'] as $task): ?>
                            <?php if ($task[2] < $today): // Only show past due tasks ?>
                                <div class="p-4 bg-white border-l-4 border-red-500 rounded-lg shadow-sm">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h4 class="font-satoshimed text-blackpri"><?= htmlspecialchars($task[0]) ?></h4>
                                            <p class="text-grey2"><?= htmlspecialchars($task[1]) ?></p>
                                            <p class="mt-2 text-sm text-red-500 font-satoshimed">Assigned to: <?= htmlspecialchars($task[3]) ?></p>
                                        </div>
                                        <span class="text-sm text-red-500">Due: <?= date('M j, Y', strtotime($task[2])) ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
            
    </main>
    
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs and contents
                    tabs.forEach(t => t.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.add('hidden');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Show corresponding content
                    const contentId = this.getAttribute('data-tab') + '-content';
                    document.getElementById(contentId).classList.remove('hidden');
                });
            });
        });
    </script>
    <style>
        .tab.active {
            background-color: #fff;
            border-bottom: none;
            margin-bottom: -1px;
        }

        .tab:hover {
            background-color: #f8f8f8;
        }

        .tab-content {
            background-color: #fff;
            border: 1px solid #000;
            border-top: none;
        }
    </style>
</body>
</html>