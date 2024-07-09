<?php
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

// Sanitize input
$school_id = $_POST['school_id'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($school_id, $password))
{
    $auth = new Authenticator();
    switch ($auth->attempt($school_id, $password)) 
    {
        case 0:
            redirect('/admin');
            break;
        case 1:
            redirect('/dashboard');
            break;
        case -1:
            $form->error('school_id', 'Invalid login credentials.');
            break;
        case -2:
            $form->error('activate', 'Please activate your Email before logging in!');
            break;
    }
}

Session::flash('errors', $form->errors());

return redirect('/login');

// return view('session/login/create.view.php', [
//     'errors' => $form->errors()
// ]);

