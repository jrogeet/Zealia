<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>

<body class="static w-screen h-auto mb-0 overflow-x-hidden bg-blue1 font-satoshimed">

    <?php view('partials/nav.view.php') ?>

    <!-- desktop -->
    <main class="relative block w-screen h-auto pt-24 pb-32 text-center bg-blue1">
        <h1 class="relative font-clashbold text-[6vw] lg:text-3xl mb-8">Account Settings</h1>

        <!-- Add success/error messages -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="mx-auto mb-6 max-w-2xl p-4 rounded-lg <?= $_SESSION['message_type'] === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
        <?php endif; ?>

        <div class="relative flex flex-wrap w-full gap-6 mb-10 h-fit">
            <!-- left box -->
            <div class="relative block w-screen p-6 mx-auto mt-6 bg-white shadow-sm h-fit lg:w-5/12 rounded-2xl">
                <!-- User Info -->
                <div class="mb-8 text-center">
                    <h1 class="mb-2 text-2xl font-bold"><?php echo "{$_SESSION['user']['f_name']} {$_SESSION['user']['l_name']}"; ?></h1>
                    <p class="text-gray-600"><?php echo "{$_SESSION['user']['school_id']}"; ?></p>
                    <p class="mt-2 text-gray-600"><?= $_SESSION['user']['email'] ?></p>
                </div>

                <!-- Improved password change form -->
                <div class="p-6 border border-black rounded-2xl bg-whitecon">
                    <h5 class="mb-4 text-xl text-blackless">Change Password</h5>
                    
                    <?php if (isset($_SESSION['errors'])): ?>
                        <div class="mb-4 space-y-2">
                            <?php foreach ($_SESSION['errors'] as $error): ?>
                                <p class="text-sm text-red-600"><?= $error ?></p>
                            <?php endforeach; ?>
                            <?php unset($_SESSION['errors']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="/account" class="space-y-4">
                        <div class="space-y-2">
                            <input class="w-full h-10 p-2 border rounded-lg border-blackless" 
                                   type="password" placeholder="Current Password" name="cur_pass" required>
                            <div class="grid grid-cols-1 gap-2 lg:grid-cols-2">
                                <input class="w-full h-10 p-2 border rounded-lg border-blackless" 
                                       type="password" placeholder="New Password" name="new_pass" required>
                                <input class="w-full h-10 p-2 border rounded-lg border-blackless" 
                                       type="password" placeholder="Confirm New Password" name="conew_pass" required>
                            </div>
                        </div>
                        <button class="w-full h-10 transition rounded-lg bg-orangeaccent hover:bg-orange-400 text-black1">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>

            <!-- right box - RIASEC Results -->
            <div class="relative block lg:border lg:border-black lg:rounded-2xl h-auto min-h-[37rem] w-screen lg:w-5/12 mx-auto mt-6 bg-white p-6 shadow-sm">
                <?php if (isset($typeNscores)): ?>
                    <div class="space-y-6">
                        <div class="text-center">
                            <h2 class="mb-2 text-2xl font-bold">Your RIASEC Profile</h2>
                            <div class="inline-block px-6 py-2 text-white rounded-full font-clashsemibold bg-blue2">
                                <?= $typeNscores['result'] ?>
                            </div>
                        </div>

                        <!-- Add radar chart for scores -->
                        <canvas id="riasecChart" class="max-w-md mx-auto"></canvas>

                        <div class="grid grid-cols-2 gap-4">
                            <?php
                            $categories = [
                                'R' => 'Realistic',
                                'I' => 'Investigative',
                                'A' => 'Artistic',
                                'S' => 'Social',
                                'E' => 'Enterprising',
                                'C' => 'Conventional'
                            ];
                            foreach ($categories as $key => $label): ?>
                                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                                    <span class="font-medium"><?= $label ?></span>
                                    <span class="text-xl font-bold text-blue2"><?= $typeNscores[$key] ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="flex justify-center gap-4">
                            <button id="downloadPDF" class="px-6 py-2 text-white transition rounded-lg bg-blue2 hover:bg-blue-600">
                                Print PDF
                            </button>
                            <a href="/test" class="px-6 py-2 transition rounded-lg bg-orangeaccent hover:bg-orange-400">
                                Retake Test
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col items-center justify-center h-full">
                        <h1 class="mb-6 text-4xl font-satoshimed">You haven't taken the test!</h1>
                        <a href="/test">
                            <button class="w-40 h-12 text-xl border rounded-2xl bg-orangeaccent border-blackless font-satoshimed">
                                Take Test
                            </button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>

    <script src="assets/js/shared-scripts.js"></script>

    <!-- Add Chart.js for radar chart -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="assets/js/chart.umd.js"></script>
    <script>
    if (document.getElementById('riasecChart')) {
        const ctx = document.getElementById('riasecChart').getContext('2d');
        
        // Get the scores and find the maximum
        const scores = [
            <?= $typeNscores['R'] ?>,
            <?= $typeNscores['I'] ?>,
            <?= $typeNscores['A'] ?>,
            <?= $typeNscores['S'] ?>,
            <?= $typeNscores['E'] ?>,
            <?= $typeNscores['C'] ?>
        ];
        const maxScore = Math.max(...scores);
        // Add 10% padding to the max score for better visualization
        const chartMax = Math.ceil(maxScore * 1.1);

        new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Realistic', 'Investigative', 'Artistic', 'Social', 'Enterprising', 'Conventional'],
                datasets: [{
                    label: 'Your Scores',
                    data: scores,
                    backgroundColor: 'rgba(3, 52, 110, 0.2)',
                    borderColor: 'rgba(3, 52, 110, 1)',
                    pointBackgroundColor: 'rgba(3, 52, 110, 1)'
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true,
                        max: chartMax
                    }
                }
            }
        });
    }
    </script>

    <?php if (isset($typeNscores)):?>
        <script src="assets/js/pdf/pdf.min.js"></script>
        <script>
            // Configure PDF.js worker
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'assets/js/pdf/pdf.worker.min.js';
        </script>
        <script>
            document.getElementById('downloadPDF').addEventListener('click', function() {
                const { jsPDF } = window.jspdf;

                // Load the template PDF
                pdfjsLib.getDocument('/assets/images/Zealia_PDF_BG.pdf').promise.then(function(pdf) {
                    pdf.getPage(1).then(function(page) {
                        const scale = 1;
                        const viewport = page.getViewport({ scale: scale });

                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        }).promise.then(function() {
                            const imgData = canvas.toDataURL('image/png');

                            const doc = new jsPDF({
                                unit: 'pt',
                                format: [viewport.width, viewport.height]
                            });

                            // Add the rendered image to the PDF
                            doc.addImage(imgData, 'PNG', 0, 0, viewport.width, viewport.height);

                            // Now add your content
                            doc.setFont("syne");

                            // Add title
                            doc.setFontSize(24);
                            doc.setTextColor(3, 52, 110);
                            doc.text("RIASEC Test Results", doc.internal.pageSize.width / 2, 40, null, null, "center");

                            // Add name and school number
                            doc.setTextColor(0, 0, 0);
                            doc.setFontSize(12);
                            doc.text(`Name: <?= $_SESSION['user']['f_name'] ?> <?= $_SESSION['user']['l_name'] ?>`, 40, 70);
                            doc.text(`School ID: <?= $_SESSION['user']['school_id'] ?>`, 40, 90);

                            // Add result
                            doc.setTextColor(0, 0, 0);
                            doc.setFont("helvetica");
                            doc.setFontSize(16);
                            doc.text("Result:", 60, 143);
                            doc.setFont("syne");
                            doc.setTextColor(3, 52, 110);
                            doc.setFontSize(24);
                            doc.text("<?= $typeNscores['result'] ?>", 120, 145);

                            // Add scores
                            doc.setFontSize(14);
                            const categories = {
                                'REALISTIC': <?= $typeNscores['R'] ?>,
                                'INVESTIGATIVE': <?= $typeNscores['I'] ?>,
                                'ARTISTIC': <?= $typeNscores['A'] ?>,
                                'SOCIAL': <?= $typeNscores['S'] ?>,
                                'ENTERPRISING': <?= $typeNscores['E'] ?>,
                                'CONVENTIONAL': <?= $typeNscores['C'] ?>
                            };

                            let yPos = 200;
                            for (const [category, score] of Object.entries(categories)) {
                                doc.setTextColor(3, 52, 110);
                                doc.text(category, 100, yPos);
                                doc.setTextColor(0, 0, 0);
                                doc.text(score.toString(), 340, yPos);
                                yPos += 30;
                            }

                            doc.setFont("helvetica");
                            doc.setTextColor(0, 0, 0);
                            // Add footer
                            doc.setFontSize(10);
                            doc.setTextColor(128, 128, 128);
                            doc.text("Generated on " + new Date().toLocaleString(), doc.internal.pageSize.width / 2, doc.internal.pageSize.height - 20, null, null, "center");

                            // Save the PDF
                            doc.save("RIASEC_Test_Results.pdf");
                        });
                    });
                }).catch(function(error) {
                    console.error('Error loading PDF template:', error);
                });
            });
        </script>
    
    <?php endif; ?>
</body>