<?php view('partials/head.view.php'); ?>

<body class="static flex font-satoshimed bg-beige">
    <?php view('partials/admin-nav.view.php'); ?>

    <div class="block w-full h-fit p-12 min-w-[75rem] transition-all duration-300 <?= $_SESSION['page-settings']['admin_nav_toggle'] ? 'ml-20' : 'ml-48' ?>" id="main-content">
        <!-- Header with Back Button -->
        <div class="flex items-center mb-8">
            <a href="/admin-tickets" class="flex items-center justify-center w-10 h-10 mr-4 text-2xl text-white transition-colors duration-200 border rounded-lg bg-blue3 border-black1 hover:bg-blue2">
                ←
            </a>
            <div>
                <h1 class="text-3xl font-clashbold text-blackpri">Ticket #<?= $ticket['ticket_id'] ?></h1>
                <p class="text-sm text-grey2">Created on <?= date('F j, Y, g:i a', strtotime($ticket['ticket_date'])) ?></p>
            </div>
        </div>

        <!-- Status and Actions Bar -->
        <div class="flex items-center justify-between mb-8">
            <div class="relative w-48">
                <div onclick="toggle('statusDD');" 
                     class="relative z-50 flex items-center justify-between w-full px-4 py-2 transition-colors duration-200 border rounded-xl hover:cursor-pointer <?php 
                        echo ($ticket['status'] == 'pending') ? 'bg-orangeaccent hover:bg-orange-400' : 
                             (($ticket['status'] == 'solved') ? 'bg-green-500 hover:bg-green-600' : 'bg-red1 hover:bg-red-600');
                     ?>">
                    <span class="text-lg text-white"><?= ucfirst($ticket['status']) ?></span>
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                
                <div id="statusDD" class="absolute z-40 hidden w-full mt-2 overflow-hidden bg-white border shadow-lg rounded-xl">
                    <form method="POST" action="/admin-view-ticket" class="border-b">
                        <input type="hidden" name="solved" value="solved">
                        <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="w-full px-4 py-2 text-left text-green-500 transition-colors hover:bg-gray-50">
                            Mark as Solved
                        </button>
                    </form>
                    <form method="POST" action="/admin-view-ticket" class="border-b">
                        <input type="hidden" name="unresolved" value="unresolved">
                        <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="w-full px-4 py-2 text-left transition-colors text-red1 hover:bg-gray-50">
                            Mark as Unresolved
                        </button>
                    </form>
                    <form method="POST" action="/admin-view-ticket">
                        <input type="hidden" name="pending" value="pending">
                        <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                        <button type="submit" class="w-full px-4 py-2 text-left transition-colors text-orangeaccent hover:bg-gray-50">
                            Mark as Pending
                        </button>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4">
                <button onclick="printTicket()" class="flex items-center px-4 py-2 text-white transition-colors duration-200 border rounded-lg bg-blue3 hover:bg-blue2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print
                </button>
                <button onclick="exportTicket()" class="flex items-center px-4 py-2 text-white transition-colors duration-200 border rounded-lg bg-blue3 hover:bg-blue2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                </button>
            </div>
        </div>

        <!-- Main Ticket Content -->
        <div class="p-8 bg-white border shadow-md rounded-2xl">
            <!-- Category Badge -->
            <div class="inline-block px-4 py-1 mb-6 text-sm text-white rounded-full bg-blue3">
                <?= ucfirst($ticket['category']) ?>
            </div>

            <!-- User Information Grid -->
            <div class="grid grid-cols-2 gap-8 mb-8">
                <div>
                    <h2 class="mb-1 text-sm text-grey2">ID Number</h2>
                    <p class="text-xl font-medium"><?= $ticket['school_id'] ?></p>
                </div>
                <div>
                    <h2 class="mb-1 text-sm text-grey2">Email</h2>
                    <p class="text-xl font-medium"><?= $ticket['email'] ?></p>
                </div>
                <div>
                    <h2 class="mb-1 text-sm text-grey2">First Name</h2>
                    <p class="text-xl font-medium"><?= $ticket['f_name'] ?></p>
                </div>
                <div>
                    <h2 class="mb-1 text-sm text-grey2">Last Name</h2>
                    <p class="text-xl font-medium"><?= $ticket['l_name'] ?></p>
                </div>
            </div>

            <!-- Message Section -->
            <div>
                <h2 class="mb-4 text-lg font-medium text-grey2">Message</h2>
                <div class="p-6 border bg-gray-50 rounded-xl">
                    <p class="whitespace-pre-wrap"><?= $ticket['message'] ?></p>
                </div>
            </div>

            <!-- Response Section (New Feature) -->
            <div class="mt-8">
                <h2 class="mb-4 text-lg font-medium text-grey2">Admin Response</h2>
                <form method="POST" action="/admin-view-ticket" class="space-y-4">
                    <input type="hidden" name="add_response" value="1">
                    <input type="hidden" name="ticket_id" value="<?= $_GET['id'] ?>">
                    <textarea name="response" rows="4" 
                              class="w-full p-4 border rounded-xl focus:outline-none focus:border-blue3"
                              placeholder="Add your response here..."><?= $ticket['admin_response'] ?? '' ?></textarea>
                    <button type="submit" 
                            class="px-6 py-2 text-white transition-colors duration-200 border rounded-lg bg-blue3 hover:bg-blue2">
                        Save Response
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function printTicket() {
            window.print();
        }

        function exportTicket() {
            const ticketData = {
                id: '<?= $ticket['ticket_id'] ?>',
                status: '<?= $ticket['status'] ?>',
                category: '<?= $ticket['category'] ?>',
                school_id: '<?= $ticket['school_id'] ?>',
                name: '<?= $ticket['f_name'] ?> <?= $ticket['l_name'] ?>',
                email: '<?= $ticket['email'] ?>',
                message: '<?= addslashes($ticket['message']) ?>',
                date: '<?= $ticket['ticket_date'] ?>',
                response: '<?= addslashes($ticket['admin_response'] ?? '') ?>'
            };

            const blob = new Blob([JSON.stringify(ticketData, null, 2)], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `ticket-${ticketData.id}.json`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        // Show success message if response was added
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('response_added')) {
                Swal.fire({
                    title: 'Success',
                    text: 'Response has been saved',
                    icon: 'success',
                    customClass: {
                        confirmButton: 'swal-confirm'
                    }
                });
            }
        });
    </script>
</body>