<?php

// Include Google API Client Library
require"../includes/firebase.php";
require '../phpmailer/PHPMailerAutoload.php';

if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
}

use Webklex\GeoIP\GeoIP;

$gp = new GeoIP();

$gp->current();
$location = $gp->get($ip);
$country = $location['location']['country']['name'];



// If authentication is required, redirect to Google Sign-In page
if (isset($_GET['code'])) {
  try{
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    // Get user info from Google API
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $fullname = $google_account_info->getName();
    $email = $google_account_info->getEmail();
    $photo = $google_account_info->getPicture();
    $gender = "N/A";
    $_SESSION['profile_picture'] = $photo;
    $dob = "00-00-000";
    $address = NULL;
    $phone = NULL;

    $query = "SELECT * FROM registration WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute(array($email, 'Google Signup'));
    if($stmt->rowCount()>0){
      while($result = $stmt->fetch(PDO:: FETCH_ASSOC)){
        $id = $result['id'];
        $acc_status = $result['acc_status'];
        if($acc_status !== "blocked"){
          $_SESSION['user_id'] = $id;
          echo "<script>window.location = \"../dashboard/index\"</script>";
        }else{
          echo '<script>
                setTimeout(function() {
                    swal({
                        title: "Error!",
                        text: "Account Inactive!",
                        type: "error"
                    }, function() {
                        window.location = "../pages/login";
                    });
                }, 1000);
            </script>';
        }
      }
    }else{
       $account_id_generator = rand(1222222222, 9000000000);
       $password_has = "Google signup";
       $password = "Google signup";
       $session_depend = "off";
       $account_status = "approved";
       $reg_time = date("d-M-Y h:i:s a");
       $account_type = "Investment Account";
       $kyc_sequence = "zero";
       $desired = 30;
       $desired2 = 10000;
       $uni = uniqid();
       $rand1 = substr($uni, 0, $desired);
       $rand2 = substr(sha1(mt_rand()),10,3);
       $rand3 = substr($uni, 0, $desired2);
       $wallet_rand = $rand2.$rand1;
       if(empty($_SESSION['who'])){
         $who = "none";
       }else{
         $who = $_SESSION['who'];
       }
       $username = '@' . trim(substr(strtolower($fullname), 0, strpos($fullname, ' '))) . $uni;

       $ssn = "000-000-0000";


       try{
         $query = "INSERT INTO registration (fullname, email, dob, login_id, who_referred, account_id, password, password_2, gender, session_depend, kyc_sequence, acc_status, address, ssn, wallet, country, phone, reg_time, account_type, user_ip) VALUES
         (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $stmt = $conn->prepare($query);
         $stmt->execute(array($fullname, $email, $dob, $username,$who, $account_id_generator, $password_has, $password, $gender, $session_depend, $kyc_sequence, $account_status, $address, $ssn, $wallet_rand, $country, $phone, $reg_time, $account_type, $ip ));
         if($stmt->rowCount()>0){
              $sender = new EmailSender($config);
              $recipient = $email;
              $subject = "Registration";
              
              $body='
              <!DOCTYPE html>
              <html>
                <head>
                  <meta charset="utf-8">
                   <style>
                    /* Add your CSS styles here */
                    * {
                      box-sizing: border-box;
                      font-family: Arial, sans-serif;
                    }
                    body {
                      margin: 0;
                      padding: 0;
                    }
                    .container {
                      max-width: 600px;
                      margin: 0 auto;
                      text-align: center;
                    }
                    .header {
                      background-color: #1e3a8a;
                      color: white;
                      padding: 30px;
                      text-align: center;
                      border-top-left-radius: 10px;
                      border-top-right-radius: 10px;
                    }
                    .header img {
                      height: 80px;
                      margin-bottom: 20px;
                    }
                    .main-content {
                      background-color: white;
                      padding: 30px;
                      text-align: left;
                      border: 1px solid #ddd;
                      border-bottom-left-radius: 10px;
                      border-bottom-right-radius: 10px;
                      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    }
                    .main-content img {
                      max-width: 100%;
                      height: auto;
                      margin-bottom: 30px;
                    }
                    .section-title {
                      font-size: 36px;
                      font-weight: bold;
                      margin-top: 0;
                      margin-bottom: 20px;
                    }
                    .subtitle {
                      font-size: 24px;
                      margin-top: 0;
                      margin-bottom: 20px;
                    }
                    .button {
                      display: inline-block;
                      background-color: #004a80;
                      color: #ffffff;
                      text-decoration: none;
                      padding: 10px 20px;
                      border-radius: 5px;
                      margin-top: 20px;
                      transition: background-color 0.3s;
                    }
                    .button:hover {
                      background-color: #003156;
                    }
                    .footer {
                      background-color: #dddddd;
                      color: #777777;
                      text-align: center;
                      padding: 20px;
                      border-radius: 0 0 10px 10px;
                    }
                    .footer p {
                      margin-bottom: 0;
                    }
                    .social-icons {
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      margin-top: 10px;
                    }
                    .social-icons a {
                      display: inline-block;
                      margin: 0 10px;
                      width: 30px;
                      height: 30px;
                      background-repeat: no-repeat;
                      background-size: contain;
                      background-position: center center;
                    }
                    .facebook {
                      background-image: url("https://cdnjs.cloudflare.com/ajax/libs/simple-icons/5.13.0/icons/facebook.svg");
                    }
                    .twitter {
                      background-image: url("https://cdnjs.cloudflare.com/ajax/libs/simple-icons/5.13.0/icons/twitter.svg");
                    }
                    .instagram {
                      background-image: url("https://cdnjs.cloudflare.com/ajax/libs/simple-icons/5.13.0/icons/instagram.svg");
                    }
                  </style>
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-qvXqNN3YbZJi5ZcP5oNxL8W+HtG5P5B5MWtI5+8W5G+MXOKPPyj/iLhrFLbWJpPLBZ+GKcECtQ2x/tBqvf3j2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                </head>
                <body>
                  <div class="container">
                    <div class="header.php">
                      <img src="https://coins-capital.tech/img/logo.png" alt="Storm Gold Logo">
                      <h1 class="section-title">Welcome to Storm Gold</h1>
                    </div>
                    <div class="main-content">
                      <img src="https://coins-capital.tech/img/hd-wide-2.jpg" alt="Welcome Image">
                      <h2 class="subtitle">Welcome to Storm Gold!</h2>
                      <p>We are delighted that you have chosen to join our investment community. Our platform offers a secure and user-friendly experience, empowering you to oversee your investments conveniently, no matter where you are.</p>
                      <p>Take advantage of our investment service with the following features:</p>
                      <ul>
                        <li>Review your investment portfolio and transaction history</li>
                        <li>Complete your KYC Validation</li>
                      </ul>
                      <p>Getting started is easy! Simply click the button below to log in to your account:</p>
                      <a href="https://coins-capital.tech/cloud/pages/login" class="button">Log in to Investment Account</a>
                      </div>
                      <div class="footer.php">
                      <p>To unsubscribe from our emails, click <a href="https://coins-capital.tech/cloud/pages/login">here</a>.</p>
                      </div>
                    </div>

                        ';
                if($sender->sendMail($subject, $recipient, $body)){
                  try{
                   $query = "SELECT * FROM registration WHERE email = ? AND password = ?";
                   $stmt = $conn->prepare($query);
                   $stmt->execute(array($email, 'Google Signup'));
                   if($stmt->rowCount()==1){
                     while($result = $stmt->fetch(PDO:: FETCH_ASSOC)){
                       $id = $result['id'];
                       $_SESSION['user_id'] = $id;
                       echo "<script>window.location = \"../dashboard/index\"</script>";
                       break;
                     }
                   }else{
                     echo "<script>
                     alert('Invalid Sign In attempt');
                     window.location = \"../pages/login\"
                     </script>";
                   }
                 }catch(PDOException $error){
                   echo "SQL Error" . $error->getMessage();
                 }
                }else{
                  try{
                   $query = "SELECT * FROM registration WHERE email = ? AND password = ?";
                   $stmt = $conn->prepare($query);
                   $stmt->execute(array($email, 'Google Signup'));
                   if($stmt->rowCount()==1){
                     while($result = $stmt->fetch(PDO:: FETCH_ASSOC)){
                       $id = $result['id'];
                       $_SESSION['user_id'] = $id;
                       echo "<script>window.location = \"../dashboard/index\"</script>";
                     }
                   }else{
                     echo "<script>
                     alert('Invalid Sign In attempt');
                     window.location = \"../pages/login\"
                     </script>";
                   }
                 }catch(PDOException $error){
                   echo "SQL Error" . $error->getMessage();
                 }
                }
         }
      }catch(PDOException $error){
        echo"SQL Error" . $error->getMessage();
      }
    }
  }catch(PDOException $error){
    echo "SQL Error" . $error->getMessage();
  }
} else {
  $auth_url = $client->createAuthUrl();

}
?>
<!--Sweet alert JS-->
<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
<!--Sweet alert JS ends here-->
