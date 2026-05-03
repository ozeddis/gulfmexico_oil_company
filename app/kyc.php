<?php
  require"header.php";
?>
<?php
    if(isset($_POST['kyc'])){
        $file_name1 = trim($_FILES['img']['name']);
        $file_temp = $_FILES['img']['tmp_name'];
        $file_size = $_FILES['img']['size'];
        $file_type = $_FILES['img']['type'];
        $file_name = md5($file_name1);
        $document_type = $_POST['doc_type'];
        $path_enc = pathinfo($file_type, PATHINFO_BASENAME);
        $location = "kyc_upload/".$file_name . "." . $path_enc;
        try{
            if(empty($file_name)){
                throw new Exception("Select Document to upload");
            }
            function check_file_uploaded_name($file_name){
              (bool)((preg_match("`^[-0-9A-Z_\.]+$`i", $file_name)) ? true :false);
            }
            if(check_file_uploaded_name($file_name !== TRUE)){
              throw new Exception("Invalid file name");
            }
            $path_ext = pathinfo($file_type, PATHINFO_BASENAME);
            
            if($path_ext !== "png" && $path_ext !== "jpg" && $path_ext !== "jpeg"){
                throw new Exception("'.$path_ext.' file types are not supported, upload an image instead!");
            }
            if($file_size > 60000000){
                throw new Exception("File size should be less than or equal to 6MB!");
            }
            $uploadOK = move_uploaded_file($file_temp, $location);
            if(!$uploadOK){
                throw new Exception("There was an error uploading your file");
            }else{
                $kyc = $location;
                $kyc_status = "pending";
                $acc_status = "pending";
                $sequence = "zero";
    
                $query = "UPDATE registration SET kyc_status = ?, kyc_documents = ?, kyc_sequence = ?, document_type = ? WHERE acc_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->execute(array($kyc_status, $kyc, $sequence, $document_type, $acc_id));
                
                if(!$stmt){
                    throw new Exception("There was an error uploading your file");
                    exit;
                }
                echo '<script>alert("Document upload was successful and will be validated within 48 hours.");window.location.replace("settings");</script>';
            }
        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'"); window.location.replace("settings");</script>';
        }
      } 
?>