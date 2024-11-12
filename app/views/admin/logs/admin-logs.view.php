<?php view('partials/head.view.php'); ?>

<body class="static flex font-synereg bg-white2">

    <?php view('partials/admin-nav.view.php'); ?>
    
    <div class="relative block w-full h-fit py-12 px-6 min-w-[75rem]">
        <div class="relative flex mt-12 mb-4">
                <h1 class="mx-auto ml-0 text-2xl font-synemed text-grey2">Logs</h1>
                <div class="flex mr-6 w-fit">
                    <input type="text" class="pl-4 mx-auto border border-black rounded-lg bg-white1">
                    <button class="mx-auto ml-4 border rounded-lg border-grey2 bg-orange1 w-28 text-black1">Search</button>
                </div>
            </div>

            <div class="border border-black rounded-xl overflow-hidden">
                <div class="relative">
                    <!-- Fixed Header -->
                    <div class="overflow-hidden">
                        <table class="w-full table-fixed">
                            <thead>
                                <tr>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Log ID</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">ID Number</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">User Type</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Action</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Status</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Target Type</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Target ID</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Timestamp</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">IP Address</th>
                                    <th class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center uppercase border-l border-r border-black bg-blue3 text-white1">Device Info</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <!-- Scrollable Body -->
                    <div class="overflow-y-auto max-h-[31.25rem]">
                        <table class="w-full table-fixed">
                            <tbody id="logs">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="/assets/js/fetch/fetch.js"></script>
        <script> 
            let logsChecker = null;
            const logsTable = document.getElementById('logs');

            document.addEventListener('DOMContentLoaded', function() {
                fetchLatestData(
                    {
                        "table": "logs"
                    }, displayLogs, 3000
                );

                function displayLogs(data) {
                    if (logsChecker == null || JSON.stringify(logsChecker) !== JSON.stringify(data)) {
                        logsChecker = data;

                        console.log('data updated', logsChecker);
                        console.log(data);

                        logsTable.innerHTML = '';
                        data.forEach(log => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.id}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.school_id}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.user_role}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.action}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.status}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.target_type}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.target_id}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.created_at}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.ip_address}</td>
                                <td class="px-0 py-3 text-xs font-semibold tracking-wider text-left text-center border-l border-r border-black bg-white1">${log.user_agent}</td>
                            `;

                            logsTable.appendChild(row);
                        });
                    } else {
                        // console.log('no update');


                    }
                }
            });
        </script>
</body>