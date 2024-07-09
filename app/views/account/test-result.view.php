<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIASEC by MBTHESIS</title>
    <link rel="stylesheet" href="assets/css/account/result.css">
</head>
<body>
    <div class="header">
        <h1> RIASEC BY MBTHESIS </h1>
    </div>

    <div class="content">
        <div class="topRes">
            <h2 id="ins">hover over scores to see more</h2>
            <div id="one" class="resBox"></div>
            <div id="two" class="resBox"></div>
            <div id="three" class="resBox"></div>
        </div>

        <div class="botRes">            
            <div id="b4" class="box"></div>
            <div id="b5" class="box"></div>
            <div id="b6" class="box"></div>
        </div>
        
        <form method="post" action="/result">
            <input type="hidden" name="rCount" value="<?php echo $rCount; ?>">
            <input type="hidden" name="iCount" value="<?php echo $iCount; ?>">
            <input type="hidden" name="aCount" value="<?php echo $aCount; ?>">
            <input type="hidden" name="sCount" value="<?php echo $sCount; ?>">
            <input type="hidden" name="eCount" value="<?php echo $eCount; ?>">
            <input type="hidden" name="cCount" value="<?php echo $cCount; ?>">
            <input type="hidden" name="finalRes" value="<?php echo $finalRes; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button>Submit</button>
        </form>
    </div>


    <script>
        var id = <?php echo json_encode($currentUser); ?>;
        var rCount = <?php echo json_encode($rCount); ?>;
        var iCount = <?php echo json_encode($iCount); ?>;
        var aCount = <?php echo json_encode($aCount); ?>;
        var sCount = <?php echo json_encode($sCount); ?>;
        var eCount = <?php echo json_encode($eCount); ?>;
        var cCount = <?php echo json_encode($cCount); ?>;
        var finalRes = <?php echo json_encode($finalRes); ?>;
    </script>
    <script src="assets/js/result.js"></script>

</body>
</html>



