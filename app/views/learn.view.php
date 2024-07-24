<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>


    <link rel="stylesheet" type="text/css" href="assets/css/partials/navbar.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/mbti.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/partials/footer.css">
</head>

<style>
    <?php require base_path('public/assets/css/shared-styles.css'); ?>

</style>
<body>
    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>
    
    <main>
        <section class="section-hero-mbti">
            <div class="mbti-hero">
                <div class="mbti-hero-header">
                    <h1>Exploring Personality Types Through <span class="mbti-m mbti-mbti">M</span><span class="mbti-b mbti-mbti">B</span><span class="mbti-t mbti-mbti">T</span><span class="mbti-i mbti-mbti">I</span></h1>
                    <p>MBTI is a tool that identifies and classifies individuals into specific personality types by assessing their preferences in four dichotomies: Extraversion<span class="mbti-m">/</span>Introversion, Sensing<span class="mbti-b">/</span>iNtuition, Thinking<span class="mbti-t">/</span>Feeling, and Judging<span class="mbti-m">/</span>Perceiving. It offers a framework for understanding behaviors, communication styles, and decision-making processes.</p>
                </div>

                <div class="mbti-hero-test">
 
                    <a class="mbti-test-btn" href="/test" target="_blank">Take Test</a>

                    <span class="mbti-test-support test-support1">Curious about your personality type?</span>
                    <span class="mbti-test-support">Discover it now by simply clicking the button above!</span>
                </div>
            </div>
        </section>

        
    
    </main>        
    <?php view('partials/footer.php')?>

    <script src="assets/js/shared-scripts.js"></script>

</body>
</html>