<?php view('partials/head.view.php'); ?>

<body>
    <?php view('partials/nav.view.php')?>

    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>

    <div class="intro" id="introDiv">
        <h1 class="page-heading">RIASEC Test</h1>
        <button  onclick="toggleTest('introDiv', 'testAndBtnContainer', 'testContainer', 'sub')" class="start" id="startButton">Start Test</button>
    </div>

    <div class="test-and-btn-container" id="testAndBtnContainer">
        <div class="test-container" id="testContainer">
            <div class="item">
                    <li class="question-item">I like to work on cars</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                    </l>
                </div>
                <div class="item">
                    <li class="question-item">I like to do puzzles</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am good at working independently</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to work in teams</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am an ambitious person, I set goals for myself</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to organize things, (files, desks/offices)</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to build things</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to read about art and music</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to have clear instructions to follow</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to try to influence or persuade people</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to do experiments</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to teach or train people</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like trying to help people solve their problems</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to take care of animals</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I wouldn’t mind working 8 hours per day in an office</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like selling things</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I enjoy creative writing</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I enjoy science</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am quick to take on new responsibilities</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am interested in healing people</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I enjoy trying to figure out how things work</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like putting things together or assembling things</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am a creative person</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I pay attention to details</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to do filing or typing</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to analyze things (problems/situations)</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to play instruments or sing</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I enjoy learning about other cultures</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I would like to start my own business</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to cook</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like acting in plays</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am a practical person</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like working with numbers or charts</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to get into discussions about issues</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I am good at keeping records of my work</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to lead</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like working outdoors</li>
                    <label class="check-area">
                        <input type="checkbox" class="r">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I would like to work in an office</li>
                    <label class="check-area">
                        <input type="checkbox" class="c">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I’m good at math</li>
                    <label class="check-area">
                        <input type="checkbox" class="i">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like helping people</li>
                    <label class="check-area">
                        <input type="checkbox" class="s">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to draw</li>
                    <label class="check-area">
                        <input type="checkbox" class="a">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="item">
                    <li class="question-item">I like to give speeches</li>
                    <label class="check-area">
                        <input type="checkbox" class="e">
                        <span class="checkmark"></span>
                    </label>
                </div>
        </div>
        <button class="sub" id="sub">Submit</button>
    </div>




    <!-- SEND TEST RESULT TO PHP: -->
    <script>
        let id = <?php echo json_encode($currentUser); ?>;
    </script>
    <script src="../assets/js/test.js"></script>
    <script src="../assets/js/shared-scripts.js"></script>
</body>
</html>

