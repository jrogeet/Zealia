<?php

use Core\Session;

view('session/login/login.view.php', [
    'errors' => Session::get('errors')
]);


