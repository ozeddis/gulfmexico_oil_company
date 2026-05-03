<?php
header('Content-Type: application/json');
  require __DIR__ . '/../functions.php';
  if(isset($_POST['login'])){
    $response = [];
    
    try{
      $email = clean_str($_POST['email']);
      $password = clean_str($_POST['password']);

      $verifyUser = $db->checkInput($email, $password);
      if(!$verifyUser){
        throw new Exception('Enter valid email & password');
      }else{
        $getData = $db->loginUser($email, $password);
        if($getData == true){
            if(isset($_SESSION['user_banking_session'])){
                if(!empty($_SESSION['user_banking_session'])){
                    if(isset($_SESSION['redirect_url'])){
                        $link = $_SESSION['redirect_url'];
                        $redirectURI = $db->sanitizeLink($link);
                        if($redirectURI == true){
                            $cleanLink = $_SESSION['redirect_uri'];
                            $response = [
                                'status' => true,
                                'response' => 'Login successful, redirecting...',
                                'url' => 'https://ibanking.bellcobank.com/app/pages' . $cleanLink,
                            ];
                        }else{
                            $response = [
                                'status' => true,
                                'response' => 'Login successful, redirecting...',
                                'url' => './dashboard',
                            ];
                        }
                    }else{
                        $redirectUrl = './dashboard';
                        $response = [
                            'status' => true,
                            'response' => 'Login successful, redirecting...',
                            'url' => $redirectUrl,
                        ];
                        
                    }
                }else{
                    throw new Exception('Invalid action');
                }
            }else{
                throw new Exception('Invalid action');
            }
        }else{
            $getData = $db->loginAdmin($email, $password);
            if($getData == true){
                if(isset($_SESSION['manager_id'])){
                    if(!empty($_SESSION['manager_id'])){
                        if(isset($_SESSION['redirect_url'])){
                            $link = $_SESSION['redirect_url'];
                            $redirectURI = $db->sanitizeLink($link);
                            if($redirectURI == true){
                                $cleanLink = $_SESSION['redirect_uri'];
                                $response = [
                                    'status' => true,
                                    'response' => 'Redirecting, please wait...',
                                    'url' => '../' . $cleanLink,
                                    'auth' => 'admin',
                                ];
                            }else{
                                $response = [
                                    'status' => true,
                                    'response' => 'Redirecting, please wait...',
                                    'url' => '../manager/dashboard.php',
                                    'auth' => 'admin',
                                ];
                            }
                        }else{
                            $redirectUrl = '../manager/dashboard.php?p=';
                            $response = [
                                'status' => true,
                                'response' => 'Redirecting, please wait...',
                                'url' => $redirectUrl,
                                'auth' => 'admin',
                            ];
                            
                        }
                    }else{
                        throw new Exception('Invalid action');
                    }
                }else{
                    throw new Exception('Invalid action');
                }
            }else{
                throw new Exception("These details does not match our records");
            }
        }
      }
    }catch(Exception $e){
        $response = [
            406,
            'status' => false,
            'response' => $e->getMessage()
        ];
    }
    // $db->returnJsonError($response);
    echo json_encode($response);
  }else{
    $db->returnJsonError([
        403, 
        'response details' => ['response_code' => 403 , 'error_status' => true, 'error_message' => 'Invalid request method'],
        
    ]);
  }

?>