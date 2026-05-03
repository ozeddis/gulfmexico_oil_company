
<?php
    if(isset($_POST['save'])){
        require'phpmailer/PHPMailerAutoload.php';
        $query = $conn->prepare("SELECT email from registration WHERE activation = ?");
        $query->execute([1]);
        $results = $query->fetchAll(PDO:: FETCH_ASSOC);
        foreach ($results as $result){
            $email = $result['email'];
            
            $emailBody = trim(mysqli_real_escape_string($connection, $_POST['message']));
            $subject = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['subject'])));
            
            // Normalize line breaks: Convert Windows-style newlines (\r\n) to Unix-style (\n)
            $emailBody = str_replace("\r\n\r\n", "<br>", $emailBody);
            
            // Convert newlines to HTML line breaks for better formatting in emails
            $emailBody = nl2br($emailBody);
            
            strtoupper($subject); 
    		
    		$mail = new PHPMailer;
    		
    		$mail->Host='smtp.hostinger.com';
    		$mail->Port=587;
    		$mail->SMTPAuth=true;
    		$mail->SMTPSecure='tls';
    		$mail->Username='info@gulfofmexicooilplatform.com';
    		$mail->Password='25!vBtH96"r@>#s';
    		$mail->setFrom('info@gulfofmexicooilplatform.com', 'Gulf Of Mexico Oil Platform');
    		$mail->addAddress($email);
    		$mail->addReplyTo('info@gulfofmexicooilplatform.com', 'Gulf Of Mexico Oil Platform');
    		
    		$mail->isHTML(true); // Enable HTML
            $mail->Encoding = 'quoted-printable';
            $mail->ContentType = 'text/html; charset=UTF-8'; // Explicitly set content type
    		$mail->Subject=$subject;
    		$mail->Body='
                    <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5; color: #333333; background-color: #f9f9f9;">
                        <div style="width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <!-- Header -->
                            <div style="background: #1f332b; color: #ffffff; text-align: center; padding: 20px;">
                                <a href="#">
                                    <img src="https://gulfmexicooffshore.com/logo.png" alt="Company Logo" style="width: 150px;">
                                </a>
                            </div>
                            <!-- Main Content -->
                            <div style="padding: 20px;">
                                <h2 style="font-size: 24px; font-weight: 600; color: #1f332b; margin: 0 0 10px;">'.$subject.'</h2>
                                <div style="margin: 20px 0; border: 1px solid #eeeeee; border-radius: 8px; padding: 10px; background: #f7f7f7;">
                                    <p style="font-size: 16px; margin: 8px 0;">'.$emailBody.'</p>
                                </div>
                            </div>
                            <!-- Footer -->
                            <div style="background: #1f332b; color: #ffffff; padding: 20px; font-size: 12px; text-align: center;">
                                <p>Need help? Contact us at <a href="mailto:info@gulfofmexicooilplatform.com" style="color: #ffffff; text-decoration: underline;">info@gulfofmexicooilplatform.com</a><br>Available 24/7</p>
                                <p><a href="#" style="color: #ffffff; text-decoration: underline;">Terms of Use</a> | <a href="#" style="color: #ffffff; text-decoration: underline;">Privacy Policy</a></p>
                            </div>
                        </div>
                    </body>'; 
            if(!$mail->send()){
                echo "<script type=\"text/javascript\">
            		alert(\"Email not sent\");
            		</script>";
            		exit;
    		}
    		$success = true;
        }
        
		
    }
?>
<div class="page-title">
  <div>
	<ul class="breadcrumb">
	  <li><i class="fa fa-home fa-lg"></i></li>
	  <li><a href="dashboard.php">Dashboard</a></li>
	</ul>
  </div>
</div>
<div class="container card">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="card">
			  <div class="card-body">
				<form action="" method="POST">
                <?php if(isset($success)){
                    echo "<p style='color:green'>News letter sent</p>";
                }
                ?>
                <div class="form-group">
					<label class="form-label">Subject</label>
					<input type="text" class="form-control" name="subject" placeholder="Enter mail subject" required>
				</div>
				<div class="form-group">
					<label class="form-label">Message body</label>
					<textarea class="form-control" placeholder="Enter your message here..." name="message" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary " name="save">SEND <i class="fa fa-arrow-up"></i></button>
				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>
