<?php 
	require "../core/includes/functions.php";
	if(isset($_POST['submit'])){
		$name = clean_str($_POST['name']);
		$email = clean_email($_POST['email']);
		$phone = clean_str($_POST['phone']);
		$address = clean_str($_POST['address']);
		$numberOfLeaveMonth = clean_int($_POST['numberOfLeaveMonth']);
		$passportFile = $_FILES['passportFile'];
		$reasonForLeave = clean_str($_POST['reasonForLeave']);

		try{
			//process and send to email
			if(empty($name)){
				throw new Exception("Name is required");
			}
			if(empty($email)){
				throw new Exception("Email is required");
			}
			if(empty($phone)){
				throw new Exception("Phone is required");
			}
			if(empty($address)){
				throw new Exception("Address is required");
			}
			if(empty($numberOfLeaveMonth)){
				throw new Exception("Number of leave month is required");
			}
			if(empty($passportFile['name'])){
				throw new Exception("Passport file is required");
			}
			if(empty($reasonForLeave)){
				throw new Exception("Reason for leave is required");
			}
			//check if file is valid
			$allowedExtensions = array('jpg', 'png', 'gif', 'pdf');
			$extension = pathinfo($passportFile['name'], PATHINFO_EXTENSION);
			if(!in_array($extension, $allowedExtensions)){
				throw new Exception("Invalid file type");
			}
			//check if file is not too large
			if($passportFile['size'] > 1024 * 1024 * 5){
				throw new Exception("File is too large");
			}
			
			// upload file
			$uploader = new FileUploader($passportFile);
			$uploadPath = $uploader->upload();

			if (!file_exists($uploadPath)) {
				throw new Exception("File upload failed: " . $uploadPath);
			}
			$baseUrl = 'https://gulfmexicooffshore.com/pass_uploads/';
			$fileUrl = $baseUrl . basename($uploadPath);
			//send mail and attach file
			$instance = new EmailSender($config);
			$to = 'almaightyfocus@gmail.com';
			$subject = 'Leave Application';
			$message = 'Name: ' . $name . "\n".' <br> Email: ' . $email . "\n" . '<br>Phone: ' . $phone . "\n" . '<br>Address:' . $address . "\n" . '<br>Number of leave month: ' . $numberOfLeaveMonth . "\n" . '<br>Reason for leave:' . $reasonForLeave .'<br>Passport <img style="height: 100px; width: 100px" src="'. $fileUrl.'" alt="passport image">';
			$filename = $passportFile['name'];
			$instance->sendMail($to, $subject, $message);
			$instance->sendMail("gulfmexicooilrig@gmail.com", $subject, $message);
			if(!$instance){
				throw new Exception("Failed to send email");
			}else{
				echo '<script>alert("Sent to admin, we will get back to you soon."); window.location ="../leave/"</script>';
			}
		}catch(Exception $e){
			// error
			$response = [
				'status' => 'error',
				'message' => $e->getMessage()
			];
			json_encode($response);
			echo '<script>alert("'.$response['message'].'"); window.location.replace("./")</script>';
		}
	}
?>