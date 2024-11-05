<?php
namespace Http\Forms;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    // Check User's input: school_id & password
    public function validate($school_id, $password, $recaptchaResponse)
    {
        if (!verifyRecaptcha($recaptchaResponse)) {
            $this->errors['recaptcha'] = 'Please complete the reCAPTCHA';
        }

        // Validate input
        if (!Validator::string($school_id) || strlen($school_id) < 5) { // Example: school_id should be at least 5 characters
            $this->errors['school_id'] = 'Please provide a valid school id number';
        }

        if (!Validator::string($password) || strlen($password) < 8) { // Example: password should be at least 8 characters
            $this->errors['password'] = 'Please provide a valid password';
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