<?php 
    require "header.php";
?>
<?php 
    if(isset($_POST['invest_now'])){
        try{
            $hidden_id = clean_str($_POST['hidden_id']);
            $amount = clean_str($_POST['amount']);
            if(!is_numeric($amount)){
                throw new Exception("Invalid amount!");
            }else{
                $query = $conn->prepare("SELECT * FROM plans WHERE id = ?");
                $query->execute([$hidden_id]);
                $results = $query->fetchAll(PDO:: FETCH_ASSOC);
                foreach($results as $result){
                    $plan_id = $result['id'];
                    $bundle = $result['bundle'];
                    $plan = $result['plan'];
                    $minimium = $result['minimium'];
                    $maximium = $result['maximium'];
                    $percentage = $result['percentage'];
                    $referal_bonus = $result['referal_bonus'];
                    $commission = $result['commission'];
                    $duration = $result['duration'];
                    $payout = $result['payout'];
                    $th = $result['th'];
                    $no_per_rollover = $result['no_of_times'];
                    $main_fee = $result['main_fee'];
                    $payout_used = $result['payout'];
                    
                    if($amount > $account){
                        throw new Exception("Insufficient balance");
                    }elseif($amount < $minimium){
                        throw new Exception("Enter amount greater or equal to $$minimium");
                    }elseif($amount > $maximium){
                        throw new Exception("Enter amount lower or equal to $$maximium");
                    }else{
                        //Calc for profit
                        $date = date("Y-m-d");
                        $time = time();
                        $date78 = date('Y');
                        $time2 = date("H:i:s", $time);
                        $date22 = Date("Y-m-d H:i:s" , $time);
                        $transaction_id = rand(100000000,999999999);
                        $transaction_id2 = rand(111111111,888888888);
                        $active = "active";
                        $pending = "pending";
                        $empty = "";
                        $image = "approved transaction";
                        $times_done = 0;
                        $start1 = "start";
                        $start2 = "no";
                        $description = "$plan Trading";
                        $description2 = "Referal Bonus";
                        
                        
                        $gain = ($amount * $percentage) / 100;
                        $commission2 = ($amount * $commission) / 100;
                        $no_of_times = $no_per_rollover;
                        $num = $gain;
                        $main_feed = ($main_fee * $amount) / 100;
                        $amount_per_times = ($num - $commission2) - $main_feed;
                        $main_money = $amount;
                        $dura = $duration;
                        $bonus = ($referal_bonus * $amount) / 100;
                        $times_done = 0;
                        $earnings = 0;
                        $payout = $payout_used;
                        $total_gain = $num - $commission2;
                        $amount_withdrawal = $total_gain + $main_money;

                        $query45 = "INSERT INTO wallet (description,wallet_address,amount,status,transaction_id,date,time) VALUES ('{$description}','{$wallet}','{$amount}','debit','{$transaction_id}','{$date}','{$time2}')";//debit the account
					    $run_query45 = mysqli_query($connect, $query45);
                        if($run_query45 == true){
                            if($who_refered == "none"){
							
                            }else{
                                $query47 = "INSERT INTO wallet (description,wallet_address,amount,status,transaction_id,date,time) VALUES ('{$description2}','{$wallet_who}','{$bonus}','{$credit}','{$transaction_id}','{$date}','{$time2}')";//debit the account
                                $run_query47 = mysqli_query($connect, $query47);
                            }

                            if($run_query45 == true){
                                $query48 = "INSERT INTO withdrawal (start_date,plan,bundle,commission,triger,email,payout,earnings,acc_id,wallet_address,no_of_times,amount_per_time,transaction_id,main_money,duration,triger2,status,date,times_done) VALUES ('{$date}','{$plan}','{$bundle}','{$commission2}','','{$email}','{$payout}','{$earnings}','{$acc_id}','{$wallet}','{$no_of_times}','{$amount_per_times}','{$transaction_id}','{$main_money}','{$dura}','{$start1}','{$pending}','{$date22}','{$times_done}')";//debit the account
                                $run_query48 = mysqli_query($connect, $query48);
                                if($run_query48 == true){
                                    echo "<script type=\"text/javascript\">
                                            alert(\"Your Order Purchase is Successful, Thank you for Trading with us.\");
                                            window.location = \"activity\"
                                            </script>";
                                }else{
                                    throw new Exception("Can not start plan");
                                }
                            }else{
                                throw new Exception("Can not debit account at this time");
                            }
                        }else{
                            throw new Exception("Can not debit account");
                        }
                    }
                }
            }
        }catch(Exception $e){
            $response = json_encode(['status' => false, 'response' => $e->getMessage(),]);
            echo "<script>alert('$response'); window.location.href = 'invest'</script>";
        }
    }
?>