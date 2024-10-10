<?php
// Authorized (Logged In)
namespace Core\Middleware;

// Redirects user to the Login page if they're trying to access a page only for [Auth]orized users
// for example: a [Guest] trying to visit /Dashboard page
class Auth
{
    public function handle()
    {
        // if(! $_SESSION['user'] ?? false) {
        //     // echo 'logged';
        //     header('location: /login');
        //     exit();
        // }

        if (! isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }
}
