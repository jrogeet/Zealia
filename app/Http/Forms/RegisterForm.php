<?php
namespace Http\Forms;
use Core\Validator;

class RegisterForm
{
    protected $errors = [];

    // Check User's input: school_id & password
    public function validate($school_id, $email, $fname, $lname, $password, $confirm_password, $recaptchaResponse)
    {
        if (!verifyRecaptcha($recaptchaResponse)) {
            $this->errors['recaptcha'] = 'Please complete the reCAPTCHA';
        }

        // Validate input
        
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'Please provide a password with a minimum length of 7 characters.';
        } elseif ($password !== $confirm_password) {
            $this->errors['password-match'] = 'Please confirm if the password match!';
        }

        if ( ! preg_match("/[a-z]/i", $password)) {
            $this->errors['password-letter'] = 'Password must contain at least one letter';
        }

        if (! preg_match("/[0-9]/", $password)) {
            $this->errors['password-number'] = 'Password must contain at least one number';
        }

        if (! Validator::string($fname, 1, 255) || ! Validator::string($lname,1, 255)) {
            $this->errors['names'] = 'You must provide a First name and a Surname';
        }

        return empty($this->errors);
    }

    // Functions for Setting Errors
    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}