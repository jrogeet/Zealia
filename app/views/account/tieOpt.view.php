<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIASEC TEST</title>
    <link rel="stylesheet" href="assets/css/account/tieOpt.css">
</head>
<body>

        <div class="content">
            <h2>Please select <?php echo $need; ?> from the <?php echo strlen($option); ?> tied results</h2>
            <?php echo $button;?>
            <h1 class='selected' id='selAtt'>currently selected attribute:</h1>
            <div class="info">
                <div class='Grid1'>
                    <h1>Realistic</h1>
                    <p>Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.</p>
                </div>
                <div class='Grid2'>
                    <h1>Investigative</h1>
                    <p>The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.</p>
                </div>
                <div class='Grid3'>
                    <h1>Artistic</h1>
                    <p>The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.</p>
                </div>
                <div class='Grid4'>
                    <h1>Social</h1>
                    <p>Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.</p>
                </div>
                <div class='Grid5'>
                    <h1>Enterprising</h1>
                    <p>Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.</p>
                </div>
                <div class='Grip'>
                    <h1>Conventional</h1>
                    <p>Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.</p>
                </div>
            </div>
            <button id="formBut" onclick="submit()">SUBMIT</button>
        </div>


    <script>
        var id = <?php echo json_encode($currentUser); ?>;
        var rCount = <?php echo json_encode($rCount); ?>;
        var iCount = <?php echo json_encode($iCount); ?>;
        var aCount = <?php echo json_encode($aCount); ?>;
        var sCount = <?php echo json_encode($sCount); ?>;
        var eCount = <?php echo json_encode($eCount); ?>;
        var cCount = <?php echo json_encode($cCount); ?>;
        var tempRes = <?php echo json_encode($tempRes); ?>;
    </script>

    <script src="assets/js/tieOpt.js"></script>

</body>
</html>