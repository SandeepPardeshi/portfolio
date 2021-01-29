<?php

/**
 * 
 */

namespace App\Lib;

class Validator
{
    private $post = [];
    private $error = [];

    public function __construct($array) {
        $this->post = $array;
    }

    /**
     * Required field validation.
     */
    public function required($required) {
        foreach($required as $key) {
            if(empty($this->post[$key])) {
                //$this->errors[$key][] = "{$key} is required field.";
                $this->errors[$key][] = $this->label($key) . " is required field.";
            }
        }
    }

    public function label($str) {
        return ucwords(str_replace('_', ' ', $str));
    }

    public function post() {
        return $this->post;
    }

    public function errors() {
        return $this->errors;
    }

    /**
     * [email function]
     * @param  [string] $field
     * @return [string]
     */
    function email($field) {
        $email=$this->post[$field];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = $this->label($field) . " address must be validate.";
        }
    }

    /**
     * [checkEmail function]
     * @param  [batabse object] $dbh      [description]
     * @param  [type] $dbhfetch [description]
     * @return [type]           [description]
     */
    function checkEmail($dbh,$dbhfetch){

        $query = "SELECT * FROM users WHERE email = :email";
        
        // Prepare the query
        $stmt = $dbh->prepare($query);

        // Bind the parameter(s)
        $params = array(
            ':email' => $this->post['email']
        );

        // Execute the query
        $stmt->execute($params);

        // Fetch the results
        $user= $stmt->fetch($dbhfetch);
        if(!empty($user)){
        $this->errors['email'][] = "Email ID exists in Data Base. "; 
    }
}

    /**
     * [lengthChecker function]
     * @param  [string] $field
     * @return [string]
     */
    function lengthChecker($field) {
        $pattern = '/^[A-Z]{3,255}$/i';

        if(!preg_match($pattern, $this->post[$field])) {
            $this->errors[$field][] = $this->label($field) . " must be at least 3 or at max 255 characters long.";
        }
    }

    /**
     * [validateStreet function]
     * @param  [string] $field
     * @return [string]
     */
    function validateStreet($field) {
        $pattern = '/^[0-9]+\,?\s+[A-Z]+[a-z]+\s*[A-Z]+[a-z]+$/';

        if(!preg_match($pattern, $this->post[$field])) {
            $this->errors[$field][] = $this->label($field) . " must be like dd, xxx xxx where d is a digit and x is alphabet.";
        }
    }

    /**
     * [validatePOcode function]
     * @param  [string] $str
     * @return [string]
     */
    function validatePOcode($str) {
        //$pattern = '/^[a-z]\d[a-z]\s\d[a-z]\d$/i';
        //
        //More Accurate Postal Code validation.
        $pattern = '/^([a-c]|e|[g-h]|[j-n]|p|[r-t]|v|[x-y])\d[a-z]\s?\d[a-z]\d$/i';

        if (!preg_match($pattern, $this->post[$str])) {
            $this->errors[$str][] = $this->label($str) . " must be valid Canadian Postal code.";
        }
    }

    /**
     * [validatePhone function]
     * @param  [string] $str
     * @return [string]
     */
    function validatePhone($str) {
        $pattern = '/^\(?\d{3}((\)\s)|(\-|\.))\d{3}(\-|\.)\d{4}$/';

        if(!preg_match($pattern, $this->post[$str])) {
            $this->errors[$str][] = $this->label($str) . " Number format must be xxx-xxx-xxxx or (xxx) xxx-xxxx.";
        }
    }

    /**
     * [validatePassword function]
     * @param  [string] $str
     * @return [string]
     */
    function validatePassword($str) {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/';

        if(!preg_match($pattern, $this->post[$str])) {
            $this->errors[$str][] = $this->label($str) . " must be at least 8 Character long with an uppercase letter, lowercase letter, a digit and a special symbol.";
        }
    }

    /**
     * [matchPassword function]
     * @param  [string] $str1
     * @param  [string] $str2
     * @return [string]
     */
    function matchPassword($str1, $str2) {
        if($this->post[$str1] != $this->post[$str2]) {
            $this->errors[$str2][] = $this->label($str2) . " must match with Password field.";
        }
    }


}