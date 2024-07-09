<?php

use Core\Session;

view('session/login/create.view.php', [
    'errors' => Session::get('errors')
]);


