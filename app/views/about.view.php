<!-- ACCOUNT SETTINGS PAGE  / PROFILE PAGE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="assets/css/about.css">
    <link rel="stylesheet" type="text/css" href="assets/css/partials/navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/partials/footer.css">
</head>


<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>
<body>
    <?php if(isset($notifications)){
        view('partials/nav.view.php', ['notifications' => $notifications]);
    } elseif (! isset($notifications)) {
        view('partials/nav.view.php');
    }
    ?>


    <main>
        <section class="section-about-container">
            <div class="about-hero">
                <h1 class="about-header">About</h1>
                <!-- <p class="about-para">Our platform uses the MBTI to build productive teams by utilizing individual personalities. Members are paired with roles that correlate with their innate talents, such as programming, analysis, or design, using MBTI assessment. Furthermore, the method finds natural leaders within teams based on MBTI profiles, assuring a balanced mix of abilities and leadership attributes. Join us as we integrate personality and teamwork science to maximize team potential.
                </p> -->
                <!-- <p class="about-para">Our platform maximizes team potential by leveraging the MBTI to build productive teams aligned with individual personalities and talents. Through MBTI assessments, members are matched with roles like programming, analysis, or design that suit their inherent skills. Moreover, it identifies natural leaders within teams based on MBTI profiles, ensuring a balanced blend of abilities and leadership traits. Join us to explore the integration of personality and teamwork science for optimal team performance.</p> -->
                <p class="about-para">Our platform uses RIASEC to align teams with individual personalities and talents, matching members to roles that suit their skills while identifying natural leaders based on their profiles, ensuring a balanced team. Explore how personality integration optimizes teamwork for peak performance.</p>
            </div>
        </section>


        <section class="section-how-container">
            <div class="how-it-works-container">
                    <div class="how-container-header">
                        <h2 class="how-header" id="how-it-works">How it works</h2>
                        <p class="how-para">The professor will create rooms where student can join, the professor can group students that already have an MBTI type or had taken the personality test.</p>
                    </div>

                    <div class="how-container">
                        <div class="left-how ">
                            <h2 class="left-how-header" id="how-it-works">1. MBTI Personality Test</h2>
                            <p class="left-how-para">Each student completes the integrated MBTI personality test within the web application.</p>
                        </div>
                    </div>

                    <div class="how-container">
                        <div class="right-how ">
                            <h2 class="right-how-header" id="how-it-works">2. Role Assignment</h2>
                            <p class="right-how-para">The algorithm assigns each student one of the four specific roles—Leader, System Analyst, System Developer, or System Designer—based on their MBTI results.</p>
                        </div>
                    </div>

                    <div class="how-container">
                        <div class="left-how ">
                            <h2 class="left-how-header" id="how-it-works">3. Compatibility Check</h2>
                            <p class="left-how-para">The algorithm identifies incompatible MBTI personality pairings and ensures that such combinations are avoided within the same group to promote team harmony.</p>
                        </div>
                    </div>

                    <div class="how-container">
                        <div class="right-how ">
                            <h2 class="right-how-header" id="how-it-works">4. Group Formation</h2>
                            <p class="right-how-para">The algorithm forms balanced groups by distributing students according to their assigned roles and ensuring compatible personality types are grouped together.</p>
                        </div>
                    </div>

                    <div class="how-container">
                        <div class="left-how ">
                            <h2 class="left-how-header" id="how-it-works">5. Handling Uneven Numbers </h2>
                            <p class="left-how-para">In cases where the number of students is not divisible evenly, the algorithm creates some groups with three members, excluding the System Designer role for these groups, as this role is considered flexible and can be handled by any team member.</p>
                        </div>
                    </div>

                    <div class="how-container">
                        <div class="right-how ">
                            <h2 class="right-how-header" id="how-it-works">6. Professor Adjustment</h2>
                            <p class="right-how-para">Professors have the ability to review the initial groupings and, based on their discernment, move students to different groups to address any specific needs or considerations not accounted for by the algorithm.</p>
                        </div>
                    </div>

                    <div class="how-container">
                        <div class="left-how ">
                            <h2 class="left-how-header" id="how-it-works">7. Final Assignment</h2>
                            <p class="left-how-para">The application finalizes the groupings, ensuring each team is composed optimally for effective collaboration on IT projects.</p>
                        </div>
                    </div>

            </div>

        </section>

        <!-- <section class="section-cards-mbti">
            <div class="deck-container">
                <h2 class="deck-header">Roles and Compatibility</h2>
                
                <div class="deck">
                    <div class="cards card-purple">
                        <span class="card-header">I<span class="cards-mbti-i">NT</span>J</span>
                            <div class="card-content">
                            <span class="roles-title">Roles Ranking</span>
                                <span class="role-des">Designer</span>
                                <span class="role-prog">Programmer</span>
                                <span class="role-lead">Leader</span>
                                <span class="role-anal">Analyst</span>
                            </div>

                            <div class="conflicts-container">
                                <span class="conflicts-title">Incompatible Personalities</span>
                                <div class="conflicts-content">
                                    <span class="no-conflicts">No Conflicts</span>
                                </div>
                            </div>
                    </div>

                    <div class="cards card-purple">
                        <span class="card-header">I<span class="cards-mbti-i">NT</span>P</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-des">Designer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-prog">Programmer</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-purple">
                        <span class="card-header">E<span class="cards-mbti-i">NT</span>J</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-des">Designer</span>
                            <span class="role-prog">Programmer</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-purple">
                        <span class="card-header">E<span class="cards-mbti-i">NT</span>P</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-des">Designer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-prog">Programmer</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-green">
                        <span class="card-header">I<span class="cards-mbti-i">NF</span>J</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-des">Designer</span>
                            <span class="role-prog">Programmer</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-green">
                        <span class="card-header">I<span class="cards-mbti-i">NF</span>P</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-des">Designer</span>
                            <span class="role-lead">Leader</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="conflicts">ISTP</span>
                                <span class="conflicts">ISFP</span>
                                <span class="conflicts">ESFP</span>
                                <span class="conflicts">ESTP</span>
                                <span class="conflicts">ENFP</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-green">
                        <span class="card-header">E<span class="cards-mbti-i">NF</span>J</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-des">Designer</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-green">
                        <span class="card-header">E<span class="cards-mbti-i">NF</span>P</span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-anal">Analyst</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-des">Designer</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="conflicts">ISTP</span>
                                <span class="conflicts">ISFP</span>
                                <span class="conflicts">ESTP</span>
                                <span class="conflicts">ESFP</span>
                                <span class="conflicts">INFP</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-blue">
                        <span class="card-header">I<span class="cards-mbti-b">S</span>T<span class="cards-mbti-b">J</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-des">Designer</span>
                            <span class="role-anal">Analyst</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    

                    <div class="cards card-blue">
                        <span class="card-header">I<span class="cards-mbti-b">S</span>F<span class="cards-mbti-b">J</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-des">Designer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                        
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-blue">
                        <span class="card-header">E<span class="cards-mbti-b">S</span>T<span class="cards-mbti-b">J</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-des">Designer</span>
                            <span class="role-anal">Analyst</span>
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-blue">
                        <span class="card-header">E<span class="cards-mbti-b">S</span>F<span class="cards-mbti-b">J</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-des">Designer</span>
                            <span class="role-anal">Analyst</span>
                
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                            <div class="conflicts-content">
                                <span class="no-conflicts">No Conflicts</span>
                            </div>
                        </div>
                    </div>

                    <div class="cards card-gold">
                        <span class="card-header">I<span class="cards-mbti-t">S</span>T<span class="cards-mbti-t">P</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-des">Designer</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                            
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                                <div class="conflicts-content">
                                    <span class="conflicts">ENFP</span>
                                    <span class="conflicts">ISFP</span>
                                    <span class="conflicts">ESTP</span>
                                    <span class="conflicts">ESFP</span>
                                    <span class="conflicts">INFP</span>
                                </div>
                            </div>
                    </div>

                    <div class="cards card-gold">
                        <span class="card-header">I<span class="cards-mbti-t">S</span>F<span class="cards-mbti-t">P</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-des">Designer</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                            
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                                <div class="conflicts-content">
                                    <span class="conflicts">ISTP</span>
                                    <span class="conflicts">ESFP</span>
                                    <span class="conflicts">ESTP</span>
                                    <span class="conflicts">INFP</span>
                                    <span class="conflicts">ENFP</span>
                                </div>
                            </div>
                    </div>

                    <div class="cards card-gold">
                        <span class="card-header">E<span class="cards-mbti-t">S</span>T<span class="cards-mbti-t">P</span></span>
                        <div class="card-content">
                        <span class="roles-title">Roles Ranking</span>
                            <span class="role-des">Designer</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                            
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                                <div class="conflicts-content">
                                    <span class="conflicts">ISTP</span>
                                    <span class="conflicts">ISFP</span>
                                    <span class="conflicts">ESFP</span>
                                    <span class="conflicts">INFP</span>
                                    <span class="conflicts">ENFP</span>
                                </div>
                            </div>
                    </div>

                    <div class="cards card-gold">
                        <span class="card-header">E<span class="cards-mbti-t">S</span>F<span class="cards-mbti-t">P</span></span>
                        <div class="card-content">
                            <span class="roles-title">Roles Ranking</span>
                            <span class="role-des">Designer</span>
                            <span class="role-prog">Programmer</span>
                            <span class="role-lead">Leader</span>
                            <span class="role-anal">Analyst</span>
                            
                        </div>
                        <div class="conflicts-container">
                            <span class="conflicts-title">Incompatible Personalities</span>
                                <div class="conflicts-content">
                                    <span class="conflicts">ISTP</span>
                                    <span class="conflicts">ISFP</span>
                                    <span class="conflicts">ESTP</span>
                                    <span class="conflicts">INFP</span>
                                    <span class="conflicts">ENFP</span>
                                </div>
                            </div>
                    </div>

                </div>

            </div>
        </section> -->
    
        <section class="team">
            <div class="team-container">
                <h2 class="team-header">MEET THE TEAM</h2>

                <div class="team-deck">
                    <div class="llamas-card-container">
                        <div class="team-card">
                            <div class="team-card-front">
                                <img src="assets/images/Team-Cards/Llamas-Card-Black.png" class="team-card-img" alt="">
                            </div>

                            <div class="team-card-back">
                                <img src="assets/images/Team-Cards/Llamas-Card-Reverse.png" class="team-card-img" alt="">
                            </div>
                        </div>
                    </div>

                <div class="gregorio-card-container">
                    <div class="team-card">
                        <div class="team-card-front">
                            <img src="assets/images/Team-Cards/Gregorio-Card-Black.png" class="team-card-img" alt="">
                        </div>

                        <div class="team-card-back">
                            <img src="assets/images/Team-Cards/Gregorio-Card-Reverse.png" class="team-card-img" alt="">
                        </div>
                    </div>
                </div>

                <div class="ganon-card-container">
                    <div class="team-card">
                        <div class="team-card-front">
                            <img src="assets/images/Team-Cards/Ganon-Card-Black.png" class="team-card-img" alt="">
                        </div>

                        <div class="team-card-back">
                            <img src="assets/images/Team-Cards/Ganon-Card-Reverse.png" class="team-card-img" alt="">
                        </div>
                    </div>
                </div>

                <div class="turqueza-card-container">
                    <div class="team-card">
                        <div class="team-card-front">
                            <img src="assets/images/Team-Cards/Turqueza-Card-Black.png" class="team-card-img" alt="">
                        </div>

                        <div class="team-card-back">
                            <img src="assets/images/Team-Cards/Turqueza-Card-Reverse.png" class="team-card-img" alt="">
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section>

    </main>

    <?php view('partials/footer.php')?>

    <script src="assets/js/shared-scripts.js"></script>
</body>

</html>