<?php 
    require "header.php";
?>
<?php 
    if(isset($_POST['amount'])){
        try{
            $currency = clean_str($_POST['currency']);
            $amount = clean_str($_POST['amount']);

            if(!is_numeric($amount)){
                throw new Exception("Invalid amount");
            }elseif(empty($currency)){
                throw new Exception("Invalid  currency type");
            }else{
                $pending = "pending";
                $transaction_id = rand(100000000,999999999);
                $date = Date("Y-m-d");
                $time = time();
                $time2 = Date("H:i:s", $time);
                $date78 = DATE('Y');
                
                $query = "INSERT INTO wallet_deposit (type,amount, status,wallet_address,transaction_id,date,time,acc_id, mode_of_payment) VALUES ('{$currency}','{$amount}','{$pending}','{$wallet}','{$transaction_id}','{$date}','{$time2}','{$acc_id}', '{$currency}')";
                $run_query = mysqli_query($connect, $query);
                
                if($run_query == true){
                    $subject = "Deposit Notification";
                    $mail = new PHPMailer;
                    
                    $mail->Host='smtp.hostinger.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
                    $mail->Username='info@gulfmexicooilplatform.com';
                    $mail->Password='&&@hgt30&T&';
                    
                    $mail->setFrom('User', 'ZenFirm');
                    $mail->addAddress('info@gulfmexicooilplatform.com');
                    $mail->addReplyTo('info@gulfmexicooilplatform.com', 'ZenFirm');
                    
                    $mail->isHTML(true);
                    $mail->Subject='Deposit:'.$subject;
                    $mail->Body='<h1>Hello ZenFirm</h1><p> You have a Deposit request from Account ID: '.$acc_id.'</p><p>© Copyright '.$date78.' ZenFirm All rights reserved.</p>';
                    
                    if($mail->send()){
                        $_SESSION['amount_did'] = $amount;
                        $_SESSION['currency'] = $currency;
                        $_SESSION['t_id'] = $transaction_id;
                        echo "<script>window.location = 'deposit_details'</script>";
                    }else{
                        $_SESSION['amount_did'] = $amount;
                        $_SESSION['currency'] = $currency;
                        $_SESSION['t_id'] = $transaction_id;
                        echo "<script>window.location = 'deposit_details'</script>";
                        //$message_failure = "You cannot make payment at the moment try again later";
                    }
                    
                }else{
                    echo "Didnt Process";
                }
            }
        }catch(Exception $e){
            $response = json_encode([ 
                'status' => false, 
                'response' => $e->getMessage()
            ]);

            echo "<script>alert('$response'); window.location.href = 'deposit'</script>";
        }
        
    }
?>
