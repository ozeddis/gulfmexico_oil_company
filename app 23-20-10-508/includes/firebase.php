<?php 
  require '../../vendor/autoload.php';
  require 'functions.php';
  try{
    $query = $conn->prepare("SELECT * FROM google_client");
    $query->execute();
    if($query->rowCount()>0){
      while($result = $query->fetch(PDO:: FETCH_ASSOC)){
        $clientId = $result['client_id'];
        $clientSecret = $result['client_secret'];
        $host = $result['client_host'];

        $client = new Google_Client();
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($host.'/app/includes/oauth');
        $client->addScope("email");
        $client->addScope("profile");

        $response = json_encode([
          'status' => 'success',
          'value' => $auth_url = $client->createAuthUrl(),
        ]);
        
      }
    }else{
      return false;
    }
  }catch(Exception $e){
    $response = json_encode([
      'status' => 'error',
      'value' => $e->getMessage(),
    ]);
  }
  echo $response;
  