<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>

<body class="static w-screen h-auto py-6 mb-0 overflow-x-hidden bg-beige font-satoshimed">

    <?php view('partials/nav.view.php') ?>

    <!-- desktop -->
    <main class="relative block w-screen h-full text-center top-10 lg:top-24">
        <h1 class="relative font-clashbold text-[6vw] lg:text-3xl">Account Settings</h1>

        <div class="relative flex flex-wrap w-full h-fit">
            <!-- left box -->
            <div class="relative block lg:border lg:border-black lg:rounded-2xl h-[70vh] min-h-[37rem] w-screen lg:w-5/12 mx-auto mt-6 bg-white lg:bg-beige text-left pt-2 pl-[3%] overflow-x-hidden">
                <h5 class="text-xl text-grey2 mt-[6%]">Name</h5>
                <h1 class="mb-6 text-3xl text-center lg:ml-4 lg:text-left"><?php echo "{$_SESSION['user']['f_name']} {$_SESSION['user']['l_name']}"; ?></h1>

                <h5 class="text-xl text-grey2">Student Number</h5>
                <h1 class="mb-6 text-3xl text-center lg:ml-4 lg:text-left"><?php echo "{$_SESSION['user']['school_id']}"; ?></h1>

                <h5 class="text-xl text-grey2 mt-36">Change Password</h5>
                <form method="POST" action="/account">
                    <input class="max-w-[192px] w-[42vw] border border-grey2 p-2 h-10 rounded-lg lg:ml-4 mt-4" type="password" placeholder="Current Password" name="cur_pass" required></input>
                    <div class="flex mt-2 lg:ml-4">
                        <input class="max-w-[192px] w-[42vw] border border-grey2 p-2 h-10 rounded-lg mt-4" type="password" placeholder="New Password" name="new_pass" required></input>
                        <input class="max-w-[192px] w-[42vw] border border-grey2 p-2 h-10 rounded-lg ml-2 lg:ml-4 mt-4" type="password" placeholder="Confirm New Password" name="conew_pass" required></input>
                    </div>
                    <button class="relative h-10 px-8 mt-12 transform -translate-x-1/2 border rounded-lg left-1/2 border-black1 bg-orangeaccent text-black1">Save Changes</button>
                </form>

            </div>

            <!-- right box -->
            <div class="relative block lg:border lg:border-black lg:rounded-2xl h-[70vh] min-h-[37rem] w-screen lg:w-5/12 mx-auto mt-6 bg-white lg:bg-beige text-left pt-2 pl-[4%] overflow-x-hidden">
                <?php if (isset($typeNscores)):?>

                    <div class="relative flex mt-10">
                        <h1 class="mt-1 ml-auto text-xl font-satoshimed text-grey2">RESULTS:</h1>
                        <label class="mr-auto text-4xl text-black font-clashsemibold top-12"><?= $typeNscores['result'] ?></label>
                    </div>
                    <div class="flex mt-16">
                        <div class="relative text-left mx-auto w-[20rem] h-5/6 pl-24">
                            <h1 class="mb-4 text-lg font-satoshimed text-grey2">REALISTIC</h1>
                            <h1 class="mb-4 text-lg font-satoshimed text-grey2">INVESTIGATIVE</h1>
                            <h1 class="mb-4 text-lg font-satoshimed text-grey2">ARTISTIC</h1>
                            <h1 class="mb-4 text-lg font-satoshimed text-grey2">SOCIAL</h1>
                            <h1 class="mb-4 text-lg font-satoshimed text-grey2">ENTERPRISING</h1>
                            <h1 class="mb-4 text-lg font-satoshimed text-grey2">CONVENTIONAL</h1>
                        </div>
                        <div class="relative text-right mx-auto w-[20rem] h-5/6 pr-32 mb-1">
                            <h1 class="mb-4 text-xl text-black font-satoshimed" id="r"><?= $typeNscores['R'] ?></h1>
                            <h1 class="mb-4 text-xl text-black font-satoshimed" id="i"><?= $typeNscores['I'] ?></h1>
                            <h1 class="mb-4 text-xl text-black font-satoshimed" id="a"><?= $typeNscores['A'] ?></h1>
                            <h1 class="mb-4 text-xl text-black font-satoshimed" id="s"><?= $typeNscores['S'] ?></h1>
                            <h1 class="mb-4 text-xl text-black font-satoshimed" id="e"><?= $typeNscores['E'] ?></h1>
                            <h1 class="mb-2 text-xl text-black font-satoshimed" id="c"><?= $typeNscores['C'] ?></h1>
                        </div>
                    </div>

                    <div class="flex justify-start ">
                        <!-- Add this button where you want it to appear -->
                        <button id="downloadPDF" class="relative h-10 p-2 mt-8 transform -translate-x-1/2 border rounded-lg left-1/2 border-black1 text-black1">Download PDF</button>
                    </div>
                    <a href="/test"><button class="relative h-10 px-8 mt-4 transform -translate-x-1/2 border rounded-lg left-1/2 border-black1 bg-orangeaccent text-black1">Retake Test</button></a>
                <?php else:?>
                    <h1 class="relative text-4xl text-center transform -translate-y-1/2 top-1/2 font-satoshimed">You haven't taken the test!</h1>
                    <a href="/test"><button class="relative w-40 h-12 text-xl transform -translate-x-1/2 border top-1/2 border-grey2 rounded-2xl bg-orangeaccent font-satoshimed left-1/2">Take Test</button></a>
                <?php endif;?>

            </div>
        </div>

    </>

    <?php view('partials/footer.view.php'); ?>

    <script src="assets/js/shared-scripts.js"></script>

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
                        const scale = 1; // Adjust scale to 1
                        const viewport = page.getViewport({ scale: scale });

                        // Create a new canvas element
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        // Render the template onto the canvas
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        }).promise.then(function() {
                            // Get the image data as a base64 string
                            const imgData = canvas.toDataURL('image/png');

                            // Create a new jsPDF instance
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
                            doc.text(document.querySelector('.font-clashsemibold').textContent, 120, 145);

                            // Add scores
                            doc.setFontSize(14);
                            const categories = ['REALISTIC', 'INVESTIGATIVE', 'ARTISTIC', 'SOCIAL', 'ENTERPRISING', 'CONVENTIONAL'];
                            const scores = ['r', 'i', 'a', 's', 'e', 'c'].map(id => document.getElementById(id).textContent);

                            let yPos = 200;
                            categories.forEach((category, index) => {
                                doc.setTextColor(3, 52, 110);
                                doc.text(category, 100, yPos);
                                doc.setTextColor(0, 0, 0);
                                doc.text(scores[index], 340, yPos);
                                yPos += 30;
                            });

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
