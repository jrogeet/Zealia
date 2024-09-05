<?php

use Core\Session;

view('session/registration/register.view.php', [
    'errors' => Session::get('errors')
]);
    


