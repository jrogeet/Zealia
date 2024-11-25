<?php view('partials/head.view.php'); ?>

<body class="flex flex-col items-center overflow-x-hidden bg-beige">
    <?php view('partials/nav.view.php')?>

    <main class="h-[40rem] w-[80rem] mt-20">
    <?php  dd($group); ?>
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
        
        <div class="w-full mt-10 border-black rounded-lg min-h-20">
            <h2 class="text-2xl font-satoshimed">Tasks</h2>
            
        </div>
            
    </main>
    
    <?php //view('partials/footer.view.php'); ?>
    <script src="assets/js/shared-scripts.js"></script>
</body>
</html>