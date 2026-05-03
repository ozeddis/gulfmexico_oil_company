
<?php
    if(isset($_POST['save'])){
        
        $body = trim(mysqli_real_escape_string($connection, $_POST['message']));
        $email = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['email'])));
        $subject = htmlentities(trim(mysqli_real_escape_string($connection, $_POST['subject'])));
        $emailBody = 
			'<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5; color: #333333; background-color: #f9f9f9;">
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
							<p style="font-size: 16px; margin: 8px 0;">'.$body.'</p>
						</div>
					</div>
					<!-- Footer -->
					<div style="background: #1f332b; color: #ffffff; padding: 20px; font-size: 12px; text-align: center;">
						<p>Need help? Contact us at <a href="mailto:test@email.com" style="color: #ffffff; text-decoration: underline;">test@email.com</a><br>Available 24/7</p>
						<p><a href="#" style="color: #ffffff; text-decoration: underline;">Terms of Use</a> | <a href="#" style="color: #ffffff; text-decoration: underline;">Privacy Policy</a></p>
					</div>
				</div>
			</body>';
        // Normalize line breaks: Convert Windows-style newlines (\r\n) to Unix-style (\n)
        $emailBody = str_replace("\r\n\r\n", "<br>", $emailBody);
        
        // Convert newlines to HTML line breaks for better formatting in emails
        $emailBody = nl2br($emailBody);
        
        strtoupper($subject); 
		require'phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		
		$mail->Host='smtp.hostinger.com';
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure='tls';
		$mail->Username='test@email.com';
		$mail->Password='password';
		$mail->setFrom('test@email.com', 'Gulf Of Mexico Oil Platform');
		$mail->addAddress($email);
		$mail->addReplyTo('test@email.com', 'Gulf Of Mexico Oil Platform');
		
		$mail->isHTML(true); // Enable HTML
        $mail->Encoding = 'quoted-printable';
        $mail->ContentType = 'text/html; charset=UTF-8'; // Explicitly set content type
		$mail->Subject=$subject;
		$mail->Body=$emailBody;
                
		if($mail->send()){
		    echo "<script type=\"text/javascript\">
        		alert(\"sent email\");
        		</script>";
		}else{
		    echo "<script type=\"text/javascript\">
        		alert(\"Email not sent\");
        		</script>";
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

				<div class="form-group">
					<label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
				</div>
                <div class="form-group">
					<label class="form-label">Subject</label>
					<input type="text" class="form-control" name="subject" placeholder="Enter mail subject" required>
				</div>
				<!--<div class="form-group">-->
				<!--	<label class="form-label">Message body</label>-->
				<!--	<textarea class="form-control" placeholder="Enter your message here..." name="message" required></textarea>-->
				<!--</div>-->
				<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                <div class="form-group">
                    <label class="form-label">Text</label>
                    <textarea size="11" class="form-control" placeholder="Type your message here (For line breaks, use <br>)" class="editor" name='message' required></textarea>
                </div>
                <script>
                    // document.querySelectorAll('textarea').forEach((el, index) => {
                    //   // Ensure each editor has a unique ID
            
                    //     el.setAttribute('id','editor_' + index)
            
                    //   CKEDITOR.replace(el.id);
                    // });
                </script>
				<button type="submit" class="btn btn-primary " name="save">SEND <i class="fa fa-arrow-up"></i></button>
				</form>
			  </div>
			</div>
		  </div>
		<div class="col-md-2">
		</div>
	</div>
</div>
