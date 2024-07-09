<?php

use Core\Session;

view('session/registration/create.view.php', [
    'errors' => Session::get('errors')
]);
    


