<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>AMBITION</title>

    <link rel="stylesheet" type="text/css"  href="assets/css/shared-styles.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/partials/navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/partials/footer.css">
    <link rel="stylesheet" type="text/css"  href="assets/css/submit-ticket.css">
</head>
<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>
</style>

<body>
    <?php view('partials/nav.view.php', ['notifications' => $notifications])?>
    
    <main>
        <div class="">
            <span>Submit Ticket</span>
        </div>
        <div class="submit-ticket-container">
            <div class="contact-container">
                <span class="email-span">Email:<a class="email-link" href="mailto:ambitionxmbti@gmail.com">ambitionxmbti@gmail.com</a></span>
            </div>
            <form method="post" action="/submit-ticket" class="actual-form">
                <div class="form-group"> 
                    <label for="category">Category</label>
                    <select name="category" id="reason" placeholder="Select Category" required>
                        <option value="">-- Select Category --</option>
                        <option value="account">Account</option>
                        <option value="rooms">Rooms</option>
                        <option value="groups">Groups</option>
                        <option value="other">Other (specify in message)</option>
                    </select>

                    <label for="f_name">First Name</label>
                    <input type="text" name="f_name" id="f_name" class="input-text" placeholder="First Name" required>
                    
                    <label for="l_name">Last Name</label>
                    <input type="text" name="l_name" id="l_name" class="input-text" placeholder="Last Name" required>

                    <label for="school_id">School ID Number (optional)</label>
                    <input type="number" name="school_id" id="school_id" class="input-number" placeholder="School ID Number">

                    <label for="year_section">Year & Section (optional)</label>
                    <input type="text" name="year_section" id="year_section" class="input-text" placeholder="Year & Section">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-email" placeholder="Email" required>

                
                    
                    <label for="message">Message</label>
                    <textarea name="message" id="message" required></textarea>

                    <div class="submit-btn-container">
                        <button type="submit">Submit</button>
                    </div>

                    <?php if(isset($success)): ?>
                    <div class="success-contianer">
                        <span class="success-text"><?= $success ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                
            </form>
        </div>
    </main>

    <?php view('partials/footer.view.php'); ?>
    
    <script src="assets/js/shared-scripts.js"></script>
</body>

<style>
    <?php 
        
        include base_path('public/assets/css/shared-styles.css');

    ?>

</style>


</html>