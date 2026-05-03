<?php

namespace {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  
  require __DIR__ . "/phpcore.inc.php";
  require __DIR__ . "/classes/db_query.php";
  require __DIR__ . "/classes/file_uploader.php";
  require __DIR__ . "/classes/mailerconnect.php";
  require __DIR__ . "/classes/get_balance.php";
  $cpMail = 'support@mydomain.com'; 

    function clean_int($data){
        // Remove any non-numeric characters except for periods and commas
        $data = preg_replace("/[^0-9.,]/", "", $data);
        
        // If the string contains both periods and commas, decide which is the decimal separator
        if (strpos($data, '.') !== false && strpos($data, ',') !== false) {
            // If the last comma is after the last period, assume commas are decimal separators
            if (strrpos($data, ',') > strrpos($data, '.')) {
                // Remove periods used as thousand separators
                $data = str_replace('.', '', $data);
                // Replace commas with periods to standardize on the decimal point
                $data = str_replace(',', '.', $data);
            } else {
                // Remove commas used as thousand separators
                $data = str_replace(',', '', $data);
            }
        } else {
            // Remove commas used as thousand separators
            $data = str_replace(',', '', $data);
        }

        // Convert to float
        $data = floatval($data);
        
        return $data;
    }
    function clean_str($data){
        // Step 1: Trim whitespace from the beginning and end
        $data = trim($data);
        
        // Step 2: Remove backslashes
        $data = stripslashes($data);
        
        // Step 3: Convert special characters to HTML entities
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        
        return $data;
    }
 
    function clean_email($data){
        // Step 1: Sanitize the email
        $data = filter_var($data, FILTER_SANITIZE_EMAIL);
        
        // Step 2: Validate the sanitized email
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return $data;
        } else {
            return false; // or handle the error as needed
        }
    }
    function obfuscateString($input, $visibleChars = 7) {
        $inputLength = strlen($input);
    
        // Ensure the visible part doesn't exceed the string length
        if ($visibleChars >= $inputLength) {
            return $input; // No obfuscation if the string is too short
        }
    
        // Extract the start visible part
        $startPart = substr($input, 0, $visibleChars);
    
        // Replace the remaining part with "xxxx"
        $hiddenPart = str_repeat('x', 6);
    
        return $startPart . $hiddenPart;
    }
    function percentageDifference($num1, $num2) {
        // Avoid division by zero
        if ($num1 == 0 && $num2 == 0) {
            return 0; // Both numbers are zero, no difference
        }
        
        // Calculate the absolute difference and the average
        $absoluteDifference = abs($num1 - $num2);
        $average = ($num1 + $num2) / 2;
        
        // Calculate the percentage difference
        $percentageDifference = ($absoluteDifference / $average) * 100;
        
        return $percentageDifference;
    }
    function get_client_ip() {
        $ip_address = '';

        // Check for shared internet or proxy IP addresses
        if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Check for forwarded IP address (if the client is behind a proxy)
            $ip_addresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ip_addresses as $ip) {
                $ip = trim($ip); // trim whitespace
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    $ip_address = $ip;
                    break;
                }
            }
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            // Default IP address method
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        return $ip_address;
    }
    function notLoggedIn($location){
        header("Location: $location");
    }

    

   function CheckCaptcha($userResponse) {
    $fields_string = '';
    $fields = array(
      //sitekey
      'secret' => '6Le9gYkdAAAAAF9BYzjrh-M0WBOs2iLsjEKwudBe',
      'response' => $userResponse
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $res = curl_exec($ch);
    curl_close($ch);

    return json_decode($res, true);
  }
   //file upload


    if (!defined('PASSWORD_BCRYPT')) {
        /**
         * PHPUnit Process isolation caches constants, but not function declarations.
         * So we need to check if the constants are defined separately from
         * the functions to enable supporting process isolation in userland
         * code.
         */
        define('PASSWORD_BCRYPT', 1);
        define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);
        define('PASSWORD_BCRYPT_DEFAULT_COST', 10);
    }

    if (!function_exists('password_hash')) {

        /**
         * Hash the password using the specified algorithm
         *
         * @param string $password The password to hash
         * @param int    $algo     The algorithm to use (Defined by PASSWORD_* constants)
         * @param array  $options  The options for the algorithm to use
         *
         * @return string|false The hashed password, or false on error.
         */
        function password_hash($password, $algo, array $options = array()) {
            if (!function_exists('crypt')) {
                trigger_error("Crypt must be loaded for password_hash to function", E_USER_WARNING);
                return null;
            }
            if (is_null($password) || is_int($password)) {
                $password = (string) $password;
            }
            if (!is_string($password)) {
                trigger_error("password_hash(): Password must be a string", E_USER_WARNING);
                return null;
            }
            if (!is_int($algo)) {
                trigger_error("password_hash() expects parameter 2 to be long, " . gettype($algo) . " given", E_USER_WARNING);
                return null;
            }
            $resultLength = 0;
            switch ($algo) {
                case PASSWORD_BCRYPT:
                    $cost = PASSWORD_BCRYPT_DEFAULT_COST;
                    if (isset($options['cost'])) {
                        $cost = (int) $options['cost'];
                        if ($cost < 4 || $cost > 31) {
                            trigger_error(sprintf("password_hash(): Invalid bcrypt cost parameter specified: %d", $cost), E_USER_WARNING);
                            return null;
                        }
                    }
                    // The length of salt to generate
                    $raw_salt_len = 16;
                    // The length required in the final serialization
                    $required_salt_len = 22;
                    $hash_format = sprintf("$2y$%02d$", $cost);
                    // The expected length of the final crypt() output
                    $resultLength = 60;
                    break;
                default:
                    trigger_error(sprintf("password_hash(): Unknown password hashing algorithm: %s", $algo), E_USER_WARNING);
                    return null;
            }
            $salt_req_encoding = false;
            if (isset($options['salt'])) {
                switch (gettype($options['salt'])) {
                    case 'NULL':
                    case 'boolean':
                    case 'integer':
                    case 'double':
                    case 'string':
                        $salt = (string) $options['salt'];
                        break;
                    case 'object':
                        if (method_exists($options['salt'], '__tostring')) {
                            $salt = (string) $options['salt'];
                            break;
                        }
                    case 'array':
                    case 'resource':
                    default:
                        trigger_error('password_hash(): Non-string salt parameter supplied', E_USER_WARNING);
                        return null;
                }
                if (PasswordCompat\binary\_strlen($salt) < $required_salt_len) {
                    trigger_error(sprintf("password_hash(): Provided salt is too short: %d expecting %d", PasswordCompat\binary\_strlen($salt), $required_salt_len), E_USER_WARNING);
                    return null;
                } elseif (0 == preg_match('#^[a-zA-Z0-9./]+$#D', $salt)) {
                    $salt_req_encoding = true;
                }
            } else {
                $buffer = '';
                $buffer_valid = false;
                if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
                    $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
                    if ($buffer) {
                        $buffer_valid = true;
                    }
                }
                if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
                    $strong = false;
                    $buffer = openssl_random_pseudo_bytes($raw_salt_len, $strong);
                    if ($buffer && $strong) {
                        $buffer_valid = true;
                    }
                }
                if (!$buffer_valid && @is_readable('/dev/urandom')) {
                    $file = fopen('/dev/urandom', 'r');
                    $read = 0;
                    $local_buffer = '';
                    while ($read < $raw_salt_len) {
                        $local_buffer .= fread($file, $raw_salt_len - $read);
                        $read = PasswordCompat\binary\_strlen($local_buffer);
                    }
                    fclose($file);
                    if ($read >= $raw_salt_len) {
                        $buffer_valid = true;
                    }
                    $buffer = str_pad($buffer, $raw_salt_len, "\0") ^ str_pad($local_buffer, $raw_salt_len, "\0");
                }
                if (!$buffer_valid || PasswordCompat\binary\_strlen($buffer) < $raw_salt_len) {
                    $buffer_length = PasswordCompat\binary\_strlen($buffer);
                    for ($i = 0; $i < $raw_salt_len; $i++) {
                        if ($i < $buffer_length) {
                            $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                        } else {
                            $buffer .= chr(mt_rand(0, 255));
                        }
                    }
                }
                $salt = $buffer;
                $salt_req_encoding = true;
            }
            if ($salt_req_encoding) {
                // encode string with the Base64 variant used by crypt
                $base64_digits =
                    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
                $bcrypt64_digits =
                    './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

                $base64_string = base64_encode($salt);
                $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);
            }
            $salt = PasswordCompat\binary\_substr($salt, 0, $required_salt_len);

            $hash = $hash_format . $salt;

            $ret = crypt($password, $hash);

            if (!is_string($ret) || PasswordCompat\binary\_strlen($ret) != $resultLength) {
                return false;
            }

            return $ret;
        }

        /**
         * Get information about the password hash. Returns an array of the information
         * that was used to generate the password hash.
         *
         * array(
         *    'algo' => 1,
         *    'algoName' => 'bcrypt',
         *    'options' => array(
         *        'cost' => PASSWORD_BCRYPT_DEFAULT_COST,
         *    ),
         * )
         *
         * @param string $hash The password hash to extract info from
         *
         * @return array The array of information about the hash.
         */
        function password_get_info($hash) {
            $return = array(
                'algo' => 0,
                'algoName' => 'unknown',
                'options' => array(),
            );
            if (PasswordCompat\binary\_substr($hash, 0, 4) == '$2y$' && PasswordCompat\binary\_strlen($hash) == 60) {
                $return['algo'] = PASSWORD_BCRYPT;
                $return['algoName'] = 'bcrypt';
                list($cost) = sscanf($hash, "$2y$%d$");
                $return['options']['cost'] = $cost;
            }
            return $return;
        }

        /**
         * Determine if the password hash needs to be rehashed according to the options provided
         *
         * If the answer is true, after validating the password using password_verify, rehash it.
         *
         * @param string $hash    The hash to test
         * @param int    $algo    The algorithm used for new password hashes
         * @param array  $options The options array passed to password_hash
         *
         * @return boolean True if the password needs to be rehashed.
         */
        function password_needs_rehash($hash, $algo, array $options = array()) {
            $info = password_get_info($hash);
            if ($info['algo'] !== (int) $algo) {
                return true;
            }
            switch ($algo) {
                case PASSWORD_BCRYPT:
                    $cost = isset($options['cost']) ? (int) $options['cost'] : PASSWORD_BCRYPT_DEFAULT_COST;
                    if ($cost !== $info['options']['cost']) {
                        return true;
                    }
                    break;
            }
            return false;
        }

        /**
         * Verify a password against a hash using a timing attack resistant approach
         *
         * @param string $password The password to verify
         * @param string $hash     The hash to verify against
         *
         * @return boolean If the password matches the hash
         */
        function password_verify($password, $hash) {
            if (!function_exists('crypt')) {
                trigger_error("Crypt must be loaded for password_verify to function", E_USER_WARNING);
                return false;
            }
            $ret = crypt($password, $hash);
            if (!is_string($ret) || PasswordCompat\binary\_strlen($ret) != PasswordCompat\binary\_strlen($hash) || PasswordCompat\binary\_strlen($ret) <= 13) {
                return false;
            }

            $status = 0;
            for ($i = 0; $i < PasswordCompat\binary\_strlen($ret); $i++) {
                $status |= (ord($ret[$i]) ^ ord($hash[$i]));
            }

            return $status === 0;
        }
    }

}

namespace PasswordCompat\binary {

    if (!function_exists('PasswordCompat\\binary\\_strlen')) {

        /**
         * Count the number of bytes in a string
         *
         * We cannot simply use strlen() for this, because it might be overwritten by the mbstring extension.
         * In this case, strlen() will count the number of *characters* based on the internal encoding. A
         * sequence of bytes might be regarded as a single multibyte character.
         *
         * @param string $binary_string The input string
         *
         * @internal
         * @return int The number of bytes
         */
        function _strlen($binary_string) {
            if (function_exists('mb_strlen')) {
                return mb_strlen($binary_string, '8bit');
            }
            return strlen($binary_string);
        }

        /**
         * Get a substring based on byte limits
         *
         * @see _strlen()
         *
         * @param string $binary_string The input string
         * @param int    $start
         * @param int    $length
         *
         * @internal
         * @return string The substring
         */
        function _substr($binary_string, $start, $length) {
            if (function_exists('mb_substr')) {
                return mb_substr($binary_string, $start, $length, '8bit');
            }
            return substr($binary_string, $start, $length);
        }

        /**
         * Check if current PHP version is compatible with the library
         *
         * @return boolean the check result
         */
        function check() {
            static $pass = NULL;

            if (is_null($pass)) {
                if (function_exists('crypt')) {
                    $hash = '$2y$04$usesomesillystringfore7hnbRJHxXVLeakoG8K30oukPsA.ztMG';
                    $test = crypt("password", $hash);
                    $pass = $test == $hash;
                } else {
                    $pass = false;
                }
            }
            return $pass;
        }

    }


}
?>
