<?php 
    class Database{
        private $conn;//instance variable
        private $error;

        public function __construct($connection){
            $this->conn = $connection;// PDO OBJECT
            $this->error = '';
        }

        public function sanitizeLink($url) {
            // Parse the URL and get the path and query if any
            $parsed_url = parse_url($url);
        
            // Concatenate the path and query parts
            $path_and_query = $parsed_url['path'] . (isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '');
            
            // Define the base paths you want to remove
            $base_path1 = "app/manager";
            $base_path2 = "app/dashboard";
        
            // Check if the path contains the base path and sanitize accordingly
            if (strpos($path_and_query, $base_path1) !== false) {
                $relative_path = str_replace($base_path1, "", $path_and_query);
            } elseif (strpos($path_and_query, $base_path2) !== false) {
                $relative_path = str_replace($base_path2, "", $path_and_query);
            } else {
                return false;
            }
        
            // Assign the sanitized path to the session
            $_SESSION['redirect_uri'] = $relative_path;
            return true;
        }

        // public function redirectAfterLogin($location){
        //     // check if session is active
        //     if (!isset($_SESSION['user_banking_session']) || !isset($_SESSION['manager_id'])) {
        //         // Get the URI the user was trying to access and store it in a session variable
            
                
        //         $_SESSION['redirect_url'] = $this->sanitizeLink();

        //         notLoggedIn($location);
        //         return true;
        //     }else{
        //         return $_SESSION['redirect_url'] = $location;
        //     }
        // }
        // $this-> defines a method of a class
        public function checkInput($email, $password){
            if(empty(trim($email)) || empty(trim($password))) {
                return false;
            }else{
                $checkEmailLen = strlen(trim($email));
                $checkPwdLen = strlen(trim($password));
                if($checkEmailLen >= 4 && $checkPwdLen >= 4){
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        return false;
                    }else{
                        return true;
                    }
                }else{
                    return false;
                }
            }
        }

        
        public function returnJsonError(array $details) {
            http_response_code($details[0]);
            echo json_encode($details);
            exit();
        }
        public function returnJsonSuccess(array $details) {
            http_response_code(200);
            echo json_encode($details);
        }
        public function loginAdmin($email, $password){
            $query = $this->conn->prepare("SELECT * FROM admin WHERE email = ?");
            $query->execute([$email]);
            $rowCount = $query->rowCount();
            if($rowCount == 1){
                $result = $query->fetch(PDO:: FETCH_ASSOC);
                $hashedPassword = $result['password'];
                if(!password_verify($password, $hashedPassword)){
                    return false;
                }else{
                    $data = $_SESSION['manager_id'] = $result['id'];
                    return true;
                }
            }else{
                return false;
            }
        }

        public function loginUser($email, $password){
            $query = $this->conn->prepare("SELECT * FROM registration WHERE email = ?");
            $query->execute([$email]);
            $rowCount = $query->rowCount();
            if($rowCount == 1){
                $result = $query->fetch(PDO:: FETCH_ASSOC);
                $hashedPassword = $result['password'];
                if (!password_verify($password, $hashedPassword)) {
                    return false;
                } else {
                    $data = $_SESSION['user_banking_session'] = $result['id'];
                    return true;
                }
            }else{
                return false;
            }
        }
        public function mailer($email, $subject, $body, $config){
            $instance = new EmailSender($config);
            return $instance->sendMail($email, $subject, $body) ?: false;
        }
        
        public function checkPhrase($seedPhrase) {
            $wordCount = str_word_count($seedPhrase);

            // Check if the word count is exactly 24 or 12
            if ($wordCount === 24 || $wordCount === 12) {
                return $wordCount;
            } else {
                return false;
            }
        }
        
        public function loginWithPhrase($seedPhrase, $password){
            $query = $this->conn->prepare("SELECT * FROM registration WHERE login_seed = ?");
            $query->execute([$seedPhrase]);
            if($query->rowCount()>0){
                while($result = $query->fetch(PDO:: FETCH_ASSOC)){
                    $account_id = $result['account_id'];
                    return $account_id;
                }
            }else{
                return false;
            }
        }

       
        public function logoutUser($user){
            unset($_SESSION['user_banking_session']);
            unset($_SESSION['redirect_uri']);
            unset($_SESSION['redirect_url']);
            header('location: https://ibanking.bellcobank.com/app/pages/login');
            exit();
            
        }
        public function logout($role = 'user') {
            if ($role === 'admin') {
                unset($_SESSION['manager_id']);
            } else {
                unset($_SESSION['user_banking_session']);
            }
            unset($_SESSION['redirect_uri'], $_SESSION['redirect_url']);
            return true;
        }
        
        public function logoutAdmin($admin){
            unset($_SESSION['manager_id']);
            unset($_SESSION['redirect_uri']);
            unset($_SESSION['redirect_url']);
            // header('location: https://ibanking.bellcobank.com/app/pages/admin');
            exit();
        }
        public function checkUserIp($user_ip){
            $query = $this->conn->prepare("SELECT * FROM registration WHERE user_ip = ?");
            $query->execute([$user_ip]);
            if($query->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }
        public function create($query, $params = []){
            try{
                
                $query = $this->conn->prepare($query);
                $query->execute($params);
                return true;
            }catch(Exception $e){
                $this->error = "Error (509): ". $e->getMessage();
                return false;
            }
        }
        
        public function checkSession() {
            return isset($_SESSION['user_wallet_session']) ? $_SESSION['user_wallet_session'] : false;
            
        }        
        
        public function getInfo($id) {
            try {
                // Check if a valid session exists
                if ($this->checkSession()) {
                    // Get user info based on session user ID
                    $sessionUserId = $id;
                    $userQuery = "SELECT * FROM registration WHERE account_id = ? AND block = ?";
                    $userStmt = $this->conn->prepare($userQuery);
                    $userStmt->execute([$sessionUserId, 'not blocked']);
        
                    if ($userStmt->rowCount() === 1) {
                        // Fetch and return the user information
                        return $userStmt->fetch(PDO::FETCH_ASSOC);
                    } else {
                        return false; // User not found or blocked
                    }
                } else {
                    return false; // No active session
                }
            } catch (Exception $e) {
                $this->error = "Error (408): " . $e->getMessage();
                return false;
            }
        }

        public function runQuery($query, $params = []) {
            try {
                $stmt = $this->conn->prepare($query);
                $stmt->execute($params);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                $this->error = "Error (408): " . $e->getMessage();
                return false;
            }
        }
        
        public function getTransactions($internal_wallet, $coin, $conversionValue) {
            $getLastTransaction = $this->conn->prepare("SELECT amount, status FROM crypto WHERE internal_wallet = ? AND coin = ? ORDER BY id DESC limit 1");
            $getLastTransaction->execute([$internal_wallet, $coin]);
            if ($getLastTransaction->rowCount()>0) {
                $getLastTransaction = $getLastTransaction->fetchAll();
                $conversionValue = round($getLastTransaction[0]['amount'] * $conversionValue, 3);
                if($getLastTransaction[0]['status'] == 'credit'){
                    $symbol = "+";
                    $color = "#2db52f";
                }elseif($getLastTransaction[0]['status'] == 'debit'){
                    $symbol = "-";
                    $color = "#bf2526";
                }else{
                    $symbol = "";
                    $color = "#bf2526";
                }
                return  [
                    'amount' => $getLastTransaction[0]['amount'],
                    'status' => $getLastTransaction[0]['status'],
                    'symbol' => $symbol,
                    'color' => $color,
                    'conversionValue' => $conversionValue,
                ];
            }else{
                return  [
                    'amount' => 0,
                    'status' => false,
                    'symbol' => '',
                    'color' => '#ffffff',
                    'conversionValue' => 0,
                ];;
            }
        }
        
        public function lastInsertId(){
            return $this->conn->lastInsertId();
        }

        public function beginTransaction(){
            return $this->conn->beginTransaction();
        }

        public function commit(){
            return $this->conn->commit();
        }

        public function rollback(){
            return $this->conn->rollback();
        }

        public function getError(){
            $error = $this->conn->errorInfo();
            return $error[2];
        }

        public function close(){
            return $this->conn = null;
        }
    }

    $db = new Database($conn);
?>