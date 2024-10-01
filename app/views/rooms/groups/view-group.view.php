<?php view('partials/head.view.php'); ?>

<body class="bg-white1 flex flex-col items-center overflow-x-hidden">
    <?php view('partials/nav.view.php')?>

    <main class="h-[40rem] w-[80rem] flex justify-between items-center mt-20">
        <!-- GROUP -->
        <div class="bg-white1 h-auto max-w-[22rem] border rounded-lg flex flex-col overflow-hidden">
            <!-- Group Head -->
            <div class="bg-blue3 h-10 w-full flex justify-center items-center ">
                <span class="font-synemed text-white1 text-4xl">Group</span>
                <span class="font-synebold text-orange1 text-4xl ml-2"><?= $_GET['group'] + 1 ?>:</span>
            </div>

            <!-- Group Body -->
            <div class="w-full">
                <!-- Each Member -->
                <?php foreach ($group[$_GET['group']] as $member) {?>
                <div class="bg-blue1 h-[6.22875rem] w-full flex">
                    <span class="w-6/12  border border-black1 flex items-center break-all p-1 font-synemed text-xl"><?= $member[0] ?></span>
                    <span class="w-6/12  border border-black1 <?php if($member[2] === 'Leader') { echo 'text-orange1'; } else { echo 'text-blue3'; }?> flex justify-center items-center p-1 font-synemed text-xl "><?= $member[2] ?></span>
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- TABLE HISTORY -->
         <div class="h-5/6 w-8/12 flex flex-col justify-between overflow-x-hidden overflow-y-auto">
            <span class="font-synebold text-3xl text-black1 text-center">Group Transfers History:</span>
            <table class="table-auto h-full w-full leading-normal border border-black rounded-xl overflow-hidden">
                <thead>
                    <tr>
                        <th class="px-0 text-center py-3 bg-black1 text-left text-xs font-synesemi text-blue1 uppercase tracking-wider border-l border-r border-black">Timestamp</th>
                        <th class="px-0 text-center py-3 bg-black1 text-left text-xs font-synesemi text-orange1 uppercase tracking-wider border-l border-r border-black">Name</th>
                        <th class="px-0 text-center py-3 bg-black1 text-left text-xs font-synesemi text-blue1  uppercase tracking-wider border-l border-r border-black">From Group</th>
                        <th class="px-0 text-center py-3 bg-black1 text-left text-xs font-synesemi text-orange1 uppercase tracking-wider border-l border-r border-black">To Group</th>
                        <th class="px-0 text-center py-3 bg-black1 text-left text-xs font-synesemi text-orange1 uppercase tracking-wider border-l border-r border-black">Reason</th>
                    </tr>
                </thead>
                <tbody class="bg-white2">
                    <?php if(! empty($groupHistory)): ?>
                        <?php foreach($groupHistory as $history): ?>
                        <tr>
                            <td class="p-5 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><?= $history['timestamp'] ?></td>
                            <td class="p-5 font-synebold border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><?= $history['name'] ?></td>
                            <td class="p-5 font-synemed text-grey2 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><?= $history['from_group'] ?></td>
                            <td class="p-5 font-synemed text-blue3 border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><?= $history['to_group'] ?></td>
                            <td class="p-5 font-synereg border-b border-gray-200 bg-white text-sm border-l border-r border-black text-center"><?= $history['reason'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5"  class="p-5 border-b border-gray-200 bg-white text-2xl font-synereg border-l border-r border-black text-center">Nothing occured to this group yet.</td>
                        </tr>
                    <?php endif; ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
         </div>
         
    </main>
    
    <?php view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>