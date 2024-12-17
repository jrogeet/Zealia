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

        // Validate school ID (updated length)
        if (!preg_match('/^\d{10,15}$/', $school_id)) {
            $this->errors['school_id'] = 'School ID must be 10-15 digits long';
        }

        // Validate email (only accept Fatima domain)
        if (!Validator::email($email) || !str_ends_with($email, '@fatima.edu.ph')) {
            $this->errors['email'] = 'Please provide a valid Fatima email address (@fatima.edu.ph)';
        }

        // Validate names (letters, spaces, and hyphens only)
        if (!preg_match('/^[a-zA-Z\s-]+$/', $fname) || !preg_match('/^[a-zA-Z\s-]+$/', $lname)) {
            $this->errors['names'] = 'Names can only contain letters, spaces, and hyphens';
        } elseif (!Validator::string($fname, 2, 50) || !Validator::string($lname, 2, 50)) {
            $this->errors['names'] = 'Names must be between 2 and 50 characters';
        }

        // Enhanced password validation
        if (!Validator::string($password, 8, 255)) {
            $this->errors['password'] = 'Password must be at least 8 characters long';
        } elseif ($password !== $confirm_password) {
            $this->errors['password-match'] = 'Passwords do not match';
        }

        if (!preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password)) {
            $this->errors['password-letter'] = 'Password must contain both uppercase and lowercase letters';
        }

        if (!preg_match("/[0-9]/", $password)) {
            $this->errors['password-number'] = 'Password must contain at least one number';
        }

        if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
            $this->errors['password-special'] = 'Password must contain at least one special character';
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