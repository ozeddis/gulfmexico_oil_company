<?php 
    require "header.php";
?>
<?php 
    if(isset($_POST['address'])){
        try{
            $currency = clean_str($_POST['currency']);
            $amount = clean_str($_POST['amount']);
            $address = clean_str($_POST['address']);

            if($amount > $account){
                throw new Exception("withdrawal is above the funds withdrawable in your ZenFirm Account");
            }elseif(empty($address)){
                throw new Exception("Invalid payment address");
            }elseif(!is_numeric($amount)){
                throw new Exception("Invalid amount");
            }elseif(empty($currency)){
                throw new Exception("Invalid  currency type");
            }else{
                $pending = "pending";
                $debit = "debit";
                $transaction_id = rand(100000000,999999999);
                $date = Date("Y-m-d");
                $time = time();
                $time2 = Date("H:i:s", $time);
                $date78 = DATE('Y');
                $description = "Withdrawal";
                
                $query = "INSERT INTO wallet (description,wallet_address,amount,status,transaction_id,date,time) VALUES 
                ('{$description}','{$wallet}','{$amount}','{$debit}','{$transaction_id}','{$date}','{$time2}')";
                $run_query = mysqli_query($connect, $query);

                if($run_query == true){
                    $query87 = "INSERT INTO withdraw_from_wallet (amount, wallet_address, status, acc_id, mb_wallet,transaction_id,date,time,coin) VALUES 
                    ('{$amount}','{$wallet}','{$pending}','{$acc_id}','{$address}','{$transaction_id}','{$date}','{$time2}','{$currency}')";
                    $run_query87 = mysqli_query($connect, $query87);
                    if($run_query87 == true){
                        $subject = "Deposit Notification";
                        $mail = new PHPMailer;
                        
                        $mail->Host='smtp.hostinger.com';
                        $mail->Port=587;
                        $mail->SMTPAuth=true;
                        $mail->SMTPSecure='tls';
                        $mail->Username='support@gulfofmexicooilplatform.com';
                        $mail->Password='&&@hgt30&T&';
                        
                        $mail->setFrom('User', 'ZenFirm');
                        $mail->addAddress('support@gulfofmexicooilplatform.com');
                        $mail->addReplyTo('support@gulfofmexicooilplatform.com', 'ZenFirm');
                        
                        $mail->isHTML(true);
                        $mail->Subject='Deposit:'.$subject;
                        $mail->Body='<h1>Hello ZenFirm</h1><p> You have a Deposit request from Account ID: '.$acc_id.'</p><p>© Copyright '.$date78.' ZenFirm All rights reserved.</p>';
                        
                        if($mail->send()){
                            $_SESSION['amount_did'] = $amount;
                            $_SESSION['currency'] = $currency;
                            $_SESSION['t_id'] = $transaction_id;
                            echo "<script>window.location = 'dashboard'</script>";
                        }else{
                            $_SESSION['amount_did'] = $amount;
                            $_SESSION['currency'] = $currency;
                            $_SESSION['t_id'] = $transaction_id;
                            echo "<script>window.location = 'dashboard'</script>";
                            //$message_failure = "You cannot make dashbo at the moment try again later";
                        }
                    }else{
                        throw new Exception("Can not withdraw at this moment, try again later");
                    }
                }else{
                    throw new Exception("Didn't process transaction");
                }
            }
        }catch(Exception $e){
            $response = json_encode([ 
                'status' => false, 
                'response' => $e->getMessage()
            ]);

            echo "<script>alert('$response'); window.location.href = 'withdrawal'</script>";
        }
        
    }
?>
<?php
	if(isset($_POST['proceed_withdraw'])){
		$amount21 = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['amount'])));
		$address = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['wallet_address'])));
		$coin = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['type'])));
		$amount26 = str_replace(',','', $amount21);
		$amount27 = str_replace('.','.', $amount26);
		$amount28 = str_replace('-','', $amount27);
		$amount = abs(preg_replace("/[^0-9^.]/", "", $amount28));
		
		$sql = "SELECT * FROM document WHERE email = '{$email}'";
		$query = mysqli_query($connection, $sql);
		
		if(mysqli_num_rows($query) > 0){
			if($tax_status == ""){
				if($tax_status == ""){
					if($insurance_status == ""){
								
						$credit = "credit";
						$debit = "debit"; 
						$pending = "pending";
						$transaction_id = rand(10000000,99999999);
						$date = Date("Y-m-d");
						$time = time();
						$time2 = Date("H:i:s", $time);
						$enable = "enable";
						$date78 = date('Y');
						
						if($amount > $account){
							echo "<script type=\"text/javascript\">
									alert(\"Requested withdrawal is above the funds withdrawable in your ZenFirm Account\");
									window.location = \"withdrawal.php\"
									</script>";
						}else{
							$query87 = "INSERT INTO withdraw_from_wallet (amount, wallet_address, status, acc_id, mb_wallet,transaction_id,date,time,coin) VALUES ('{$amount}','{$wallet}','{$pending}','{$acc_id}','{$address}','{$transaction_id}','{$date}','{$time2}','{$coin}')";
							$run_query87 = mysqli_query($connection, $query87);
							
							$date44 = Date("Y-m-d");
							$time32 = time();
							$time44 = Date("H:i:s", $time32);
							$description = "Withdrawal";
							
							if($run_query == true){
                                $query87 = "INSERT INTO withdraw_from_wallet (amount, wallet_address, status, acc_id, mb_wallet,transaction_id,date,time,coin) VALUES 
                                ('{$amount}','{$wallet}','{$pending}','{$acc_id}','{$address}','{$transaction_id}','{$date}','{$time2}','{$currency}')";
                                $run_query87 = mysqli_query($connect, $query87);
                                if($run_query87 == true){
                                    $subject = "Deposit Notification";
                                    $mail = new PHPMailer;
                                    
                                    $mail->Host='smtp.hostinger.com';
                                    $mail->Port=587;
                                    $mail->SMTPAuth=true;
                                    $mail->SMTPSecure='tls';
                                    $mail->Username='support@gulfofmexicooilplatform.com';
                                    $mail->Password='&&@hgt30&T&';
                                    
                                    $mail->setFrom('User', 'ZenFirm');
                                    $mail->addAddress('support@gulfofmexicooilplatform.com');
                                    $mail->addReplyTo('support@gulfofmexicooilplatform.com', 'ZenFirm');
                                    
                                    $mail->isHTML(true);
                                    $mail->Subject='Deposit:'.$subject;
                                    $mail->Body='<h1>Hello ZenFirm</h1><p> You have a Deposit request from Account ID: '.$acc_id.'</p><p>© Copyright '.$date78.' ZenFirm All rights reserved.</p>';
                                    
                                    if($mail->send()){
                                        $_SESSION['amount_did'] = $amount;
                                        $_SESSION['currency'] = $currency;
                                        $_SESSION['t_id'] = $transaction_id;
                                        echo "<script>window.location = 'dashboard'</script>";
                                    }else{
                                        $_SESSION['amount_did'] = $amount;
                                        $_SESSION['currency'] = $currency;
                                        $_SESSION['t_id'] = $transaction_id;
                                        echo "<script>window.location = 'dashboard'</script>";
                                        //$message_failure = "You cannot make payment at the moment try again later";
                                    }
                                }else{
                                    throw new Exception("Can not withdraw at this moment, try again later");
                                }
                            }else{
                                throw new Exception("Failed to process transaction");
                            }
						}
					}else{
						echo "<script type=\"text/javascript\">
						alert(\"Cryptocurrency Insurance needed in your Account to complete this transaction\");
						window.location = \"withdrawal.php\"
						</script>";
					}
				}else{
					echo "<script type=\"text/javascript\">
					alert(\"Payable Tax is required in your Account to complete this transaction\");
					window.location = \"withdrawal.php\"
					</script>";
				}
			}else{
				echo "<script type=\"text/javascript\">
					alert(\"Trading Rate upgrade is required in your Account to complete this transaction\");
					window.location = \"withdrawal.php\"
					</script>";
			}
		}else{
			echo "<script type=\"text/javascript\">
			alert(\"KYC is required for this account, kindly uploaded your document for identification.\");
			window.location = \"withdrawal.php\"
			</script>";
		}
	}
?>