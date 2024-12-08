<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="block w-full h-fit p-12 min-w-[75rem] transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="mb-2 text-4xl text-black font-clashbold"><?= $user['f_name'] . ' ' . $user['l_name'] ?></h1>
                <h2 class="text-xl text-grey2 font-satoshimed">User Logs for ID: <?= $school_id ?></h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <select id="sortBy" class="h-10 pl-4 pr-8 transition-colors bg-white border-2 border-black rounded-lg appearance-none cursor-pointer hover:bg-gray-50" onchange="handleSort()">
                        <option value="">Sort by date</option>
                        <option value="date_asc">Oldest First</option>
                        <option value="date_desc">Newest First</option>
                    </select>
                    <div class="absolute -translate-y-1/2 pointer-events-none right-2 top-1/2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                    <button id="clearSort" class="absolute flex items-center justify-center hidden w-8 h-8 text-white transition-colors rounded-full -right-10 bg-red1 hover:bg-red-600" onclick="clearSort()">×</button>
                </div>
                <button class="flex items-center h-10 gap-2 px-6 text-white transition-colors rounded-lg bg-blue3 font-satoshimed hover:bg-blue-700" onclick="downloadPDF()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Download PDF
                </button>
            </div>
        </div>

        <div class="mt-8 overflow-hidden bg-white border border-black shadow-lg rounded-xl">
            <div class="relative">
                <!-- Fixed Header -->
                <div class="overflow-hidden">
                    <table class="w-full table-fixed">
                        <thead>
                            <tr>
                                <th class="w-20 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Log ID</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">User Type</th>
                                <th class="w-48 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Action</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Status</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Target Type</th>
                                <th class="w-24 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Target ID</th>
                                <th class="w-40 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Created At</th>
                                <th class="w-32 px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">IP Address</th>
                                <th class="px-4 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase border-l border-r border-black bg-blue3">Device Info</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Scrollable Body -->
                <div class="overflow-y-auto max-h-[31.25rem]">
                    <table class="w-full table-fixed">
                        <tbody id="logs">
                            <?php if (!empty($logs)) : ?>
                                <?php foreach ($logs as $log) : ?>
                                    <?php
                                    // Determine status color
                                    $statusColor = '';
                                    switch(strtolower($log['status'])) {
                                        case 'success':
                                            $statusColor = 'text-green-600';
                                            break;
                                        case 'failed':
                                            $statusColor = 'text-red-600';
                                            break;
                                        case 'pending':
                                            $statusColor = 'text-yellow-600';
                                            break;
                                        default:
                                            $statusColor = 'text-gray-600';
                                    }
                                    ?>
                                    <tr class="transition-colors border-b border-black hover:bg-gray-50">
                                        <td class="w-20 px-4 py-3 text-sm border-l border-r border-black"><?= $log['id'] ?></td>
                                        <td class="w-24 px-4 py-3 text-sm border-l border-r border-black"><?= $log['user_role'] ?></td>
                                        <td class="w-48 px-4 py-3 text-sm border-l border-r border-black"><?= $log['action'] ?></td>
                                        <td class="px-4 py-3 text-sm border-l border-r border-black w-24 font-medium <?= $statusColor ?>"><?= $log['status'] ?></td>
                                        <td class="w-24 px-4 py-3 text-sm border-l border-r border-black"><?= $log['target_type'] ?></td>
                                        <td class="w-24 px-4 py-3 text-sm border-l border-r border-black"><?= $log['target_id'] ?></td>
                                        <td class="w-40 px-4 py-3 text-sm border-l border-r border-black"><?= $log['created_at'] ?></td>
                                        <td class="w-32 px-4 py-3 font-mono text-xs text-sm border-l border-r border-black"><?= $log['ip_address'] ?></td>
                                        <td class="px-4 py-3 text-xs text-sm truncate border-l border-r border-black"><?= $log['user_agent'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr class="border-b border-black">
                                    <td colspan="9" class="px-5 py-12 text-xl text-center text-grey1 bg-gray-50">
                                        <div class="flex flex-col items-center gap-2">
                                            <svg class="w-12 h-12 text-grey2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                            No logs found
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const logsTable = document.getElementById('logs');
        const originalHTML = logsTable.innerHTML;

        function handleSort() {
            const sortBy = document.getElementById('sortBy').value;
            if (sortBy) {
                document.getElementById('clearSort').classList.remove('hidden');
                
                const rows = Array.from(logsTable.getElementsByTagName('tr'));
                if (rows.length <= 1) return; // Don't sort if only one or no rows
                
                rows.sort((a, b) => {
                    const dateA = new Date(a.cells[6].textContent); // Index 6 is the timestamp column
                    const dateB = new Date(b.cells[6].textContent);
                    return sortBy === 'date_asc' ? dateA - dateB : dateB - dateA;
                });
                
                logsTable.innerHTML = '';
                rows.forEach(row => logsTable.appendChild(row));
            }
        }

        function clearSort() {
            document.getElementById('sortBy').value = '';
            document.getElementById('clearSort').classList.add('hidden');
            logsTable.innerHTML = originalHTML;
        }
    </script>

    <!-- Add PDF Generation Scripts -->
    <script src="/assets/js/pdf/jspdf.umd.min.js"></script>
    <script src="/assets/js/pdf/jspdf.plugin.autotable.min.js"></script>
    <script>
        async function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'landscape',
                unit: 'mm',
                format: 'a4'
            });

            // Get the logs data from the table
            const rows = Array.from(logsTable.getElementsByTagName('tr'));
            const cleanData = rows.map(row => [
                row.cells[0].textContent, // Log ID
                row.cells[1].textContent, // User Type
                row.cells[2].textContent, // Action
                row.cells[3].textContent, // Status
                row.cells[4].textContent, // Target Type
                row.cells[5].textContent, // Target ID
                row.cells[6].textContent, // Timestamp
                row.cells[7].textContent, // IP Address
                row.cells[8].textContent  // Device Info
            ]);

            // Add title and user information
            doc.setFontSize(20);
            doc.setTextColor(0, 0, 0);
            const userName = "<?= $user['f_name'] . ' ' . $user['l_name'] ?>";
            doc.text(`User Activity Logs - ${userName}`, 15, 20);
            
            doc.setFontSize(12);
            doc.text(`School ID: <?= $school_id ?>`, 15, 30);

            // Create the table
            doc.autoTable({
                startY: 40,
                head: [['Log ID', 'User Type', 'Action', 'Status', 'Target Type', 'Target ID', 'Timestamp', 'IP Address', 'Device Info']],
                body: cleanData,
                theme: 'grid',
                styles: { 
                    fontSize: 8,
                    cellPadding: 2,
                    textColor: [0, 0, 0],
                    lineWidth: 0.1
                },
                headStyles: {
                    fillColor: [3, 52, 110],
                    textColor: [255, 255, 255],
                    fontSize: 9,
                    fontStyle: 'bold',
                    lineWidth: 0.1
                },
                margin: { top: 40, right: 15, bottom: 20, left: 15 },
                didParseCell: function(data) {
                    if (data.row.index !== undefined && data.row.index >= 0) {
                        if (data.column.index === 7 || data.column.index === 8) {
                            data.cell.styles.fontSize = 7;
                        }
                    }
                }
            });

            // Add footer information
            const adminName = "<?= $_SESSION['user']['f_name'] . ' ' . $_SESSION['user']['l_name'] ?>";
            const timestamp = new Date().toLocaleString();

            doc.setTextColor(128, 128, 128);
            doc.setFontSize(10);
            doc.text(`Generated by: ${adminName}`, 15, doc.internal.pageSize.height - 20);
            doc.text(`Generated on: ${timestamp}`, 15, doc.internal.pageSize.height - 10);

            const pdfBlob = doc.output('blob', { type: 'application/pdf' });
            const filename = `user_logs_${userName.replace(/\s+/g, '_')}.pdf`;

            // Create a download link
            const downloadLink = document.createElement('a');
            downloadLink.href = URL.createObjectURL(pdfBlob);
            downloadLink.download = filename;

            // Create a preview link
            const previewLink = document.createElement('a');
            previewLink.href = URL.createObjectURL(pdfBlob);
            previewLink.target = '_blank';

            // Create a dialog to ask user preference
            const userChoice = confirm('Would you like to:\nOK - Download the PDF\nCancel - Preview it first in a new tab');

            if (userChoice) {
                // User chose to download
                downloadLink.click();
            } else {
                // User chose to preview
                previewLink.click();
            }

            // Clean up the Blob URLs after a delay
            setTimeout(() => {
                URL.revokeObjectURL(downloadLink.href);
                URL.revokeObjectURL(previewLink.href);
            }, 1000);
        }
    </script>

<script>
    // Adjust main content margin when sidebar is toggled
    document.getElementById('toggle-sidebar').addEventListener('click', function() {
        const mainContent = document.getElementById('main-content');
        mainContent.classList.toggle('ml-48');
        mainContent.classList.toggle('ml-20');
    });
</script>
</body>