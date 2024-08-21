<?php

namespace Core;

class Session
{
    // Checks if Session has a certain key
    public static function has($key)
    {
        return (bool) static::get($key);
    }

    // Put a key and value pair in the Session
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        // if (isset($_SESSION['_flash'][$key]))
        // {
        //     return $_SESSION['_flash'][$key];
        // }

        // return $_SESSION[$key] ?? $default;

        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }


    // Add a value into the _flash
    // _flash is for Flashing information
    // Used for Login or Sign Up errors (one of the user's input will remain in the input field even after refreshing the page for errors)
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    // Remove _flash key
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    // Empty out Session
    public static function flush()
    {
        $_SESSION = [];
    }

    // Destroy or Delete Session details when Logged Out
    public static function destroy()
    {
        Session::flush();
        session_destroy(); // Destroy the session file
    
        $params = session_get_cookie_params(); // Gets the information about the CURRENT COOKIE
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}