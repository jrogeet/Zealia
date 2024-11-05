<?php

use Core\Session;
use Model\App;

$config = App::resolve('config');

view('session/registration/register.view.php', [
    'errors' => Session::get('errors'),
    'config' => $config
]);
    


