<?php
header('Content-Type: application/json');
  require __DIR__ . '/../functions.php';
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    // set the response variable
    $response = [];
    try{
      $email = clean_str($_POST['email']);
      $password = clean_str($_POST['password']);

      $verifyUser = $db->checkInput($email, $password);
      if(!$verifyUser){
        throw new Exception('Enter valid email & password');
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
                                    'response' => 'Redirecting to admin, please wait...',
                                    'url' => 'https://ibanking.bellcobank.com/app/manager' . $cleanLink,
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
                            $redirectUrl = './app/manager/dashboard.php';
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