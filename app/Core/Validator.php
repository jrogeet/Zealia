<?php
namespace Core;

// Validates Password and Email upon Registration
class Validator
{
    // Pure Function (not dependent to outside variables etc.) so static:
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    
    // Checks if Email is valid and is a Fatima email
    public static function email($value)
    {
        $email_parts = explode('@', $value);
        if (count($email_parts) < 2) {
            return false;
        }
        $domain = array_pop($email_parts);
        if ($domain === 'student.fatima.edu.ph' OR $domain === 'fatima.edu.ph') {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }

        return false;
    }
}