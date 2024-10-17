<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->
<?php view('partials/head.view.php'); ?>

<body class="static bg-white1 py-6 font-synereg w-screen h-fit mb-0 overflow-x-hidden">

    <?php view('partials/nav.view.php') ?>

    <?php //dd($_SESSION['user']['result'])?>

    <!-- desktop -->
    <div class="relative block w-screen h-full text-center top-10 lg:top-24">
        <h1 class="relative font-synebold text-[6vw] lg:text-3xl">Account Settings</h1>

        <div class="relative flex flex-wrap w-full h-fit">
            <!-- left box -->
            <div class="relative block lg:border lg:border-black lg:rounded-2xl h-[70vh] min-h-[37rem] w-screen lg:w-5/12 mx-auto mt-6 bg-white1 lg:bg-white2 text-left pt-2 pl-[3%] overflow-x-hidden">
                <h5 class="text-xl text-grey2 mt-[6%]">Name</h5>
                <h1 class="text-3xl lg:ml-4 mb-6 text-center lg:text-left"><?php echo "{$_SESSION['user']['f_name']} {$_SESSION['user']['l_name']}"; ?></h1>

                <h5 class="text-xl text-grey2">Student Number</h5>
                <h1 class="text-3xl lg:ml-4 mb-6 text-center lg:text-left"><?php echo "{$_SESSION['user']['school_id']}"; ?></h1>

                <h5 class="text-xl text-grey2 mt-36">Change Password</h5>
                <form method="POST" action="/account">
                    <input class="max-w-[192px] w-[42vw] border border-grey2 p-2 h-10 rounded-lg lg:ml-4 mt-4" type="text" placeholder="Current Password" name="cur_pass" required></input>
                    <div class="flex mt-2 lg:ml-4">
                        <input class="max-w-[192px] w-[42vw] border border-grey2 p-2 h-10 rounded-lg mt-4" type="text" placeholder="New Password" name="new_pass" required></input>
                        <input class="max-w-[192px] w-[42vw] border border-grey2 p-2 h-10 rounded-lg ml-2 lg:ml-4 mt-4" type="text" placeholder="Confirm New Password" name="conew_pass" required></input>
                    </div>
                    <button class="relative left-1/2 transform -translate-x-1/2 border border-black1 rounded-lg px-8 h-10 bg-orange1 text-black1 mt-12">Save Changes</button>
                </form>

            </div>

            <!-- right box -->
            <div class="relative block lg:border lg:border-black lg:rounded-2xl h-[70vh] min-h-[37rem] w-screen lg:w-5/12 mx-auto mt-6 bg-white1 lg:bg-white2 text-left pt-2 pl-[4%] overflow-x-hidden">
                <?php if (isset($typeNscores)):?>

                    <div class="relative flex mt-10">
                        <h1 class="font-synemed text-xl text-grey2 ml-auto mt-1">RESULTS:</h1>
                        <label class="font-syneboldextra text-4xl text-black top-12 mr-auto"><?= $typeNscores['result'] ?></label>
                    </div>
                    <div class="flex mt-16">
                        <div class="relative text-left mx-auto w-[20rem] h-5/6 pl-24">
                            <h1 class="font-synemed text-lg text-grey2 mb-4">REALISTIC</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">INVESTIGATIVE</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">ARTISTIC</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">SOCIAL</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">ENTERPRISING</h1>
                            <h1 class="font-synemed text-lg text-grey2 mb-4">CONVENTIONAL</h1>
                        </div>
                        <div class="relative text-right mx-auto w-[20rem] h-5/6 pr-32 mb-1">
                            <h1 class="font-synemed text-xl text-black mb-4" id="r"><?= $typeNscores['R'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="i"><?= $typeNscores['I'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="a"><?= $typeNscores['A'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="s"><?= $typeNscores['S'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-4" id="e"><?= $typeNscores['E'] ?></h1>
                            <h1 class="font-synemed text-xl text-black mb-2" id="c"><?= $typeNscores['C'] ?></h1>
                        </div>
                    </div>

                    <div class=" flex justify-start">
                        <!-- Add this button where you want it to appear -->
                        <button id="downloadPDF" class="relative left-1/2 transform -translate-x-1/2 border border-black1 rounded-lg p-2 h-10 mt-8  text-black1">Download PDF</button>
                    </div>
                    <a href="/test"><button class="relative left-1/2 transform -translate-x-1/2 border border-black1 rounded-lg px-8 h-10 mt-4 bg-orange1 text-black1">Retake Test</button></a>
                <?php else:?>
                    <h1 class="relative top-1/2 transform -translate-y-1/2 font-synemed text-4xl text-center">You haven't taken the test!</h1>
                    <a href="/test"><button class="relative top-1/2 border border-grey2 rounded-2xl w-40 h-12 bg-orange1 font-synemed text-xl left-1/2 transform -translate-x-1/2">Take Test</button></a>
                <?php endif;?>

            </div>
        </div>

    </div>

    <?php view('partials/footer.view.php'); ?>

    <script src="assets/js/shared-scripts.js"></script>

    <?php if (isset($typeNscores)):?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
        <script>
            // Configure PDF.js worker
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';
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
                            doc.text(document.querySelector('.font-syneboldextra').textContent, 120, 145);

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
