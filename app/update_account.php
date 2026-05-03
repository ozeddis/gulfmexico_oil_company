<?php 
    include "header.php";
?>
<?php 
    if(isset($_POST['old_password'])){
        try{
            $old = clean_str(md5(sha1($_POST['old_password'])));
            $new = clean_str($_POST['new_password']);
            $confirm = clean_str($_POST['cnew_password']);

            if($old !== $password){
                throw new Exception("Invalid Old password");
            }elseif(empty($new) || empty($confirm)){
                throw new Exception('INVALID PASSWORD');
            }elseif($new !== $confirm){
                throw new Exception("Passwords do not match");
            }else{
                $newHash = md5(sha1($new));
                $query = $conn->prepare("UPDATE registration SET password = ? AND password2 = ? WHERE id = ?");
                $query->execute([$newHash, $confirm, $user_id]);
                if($query->rowCount()>0){
                    $response = json_encode([
                        'status' => true,
                        'response' => 'Password changed'
                    ]);
                }else{
                    throw new Exception("Failed to update password");
                }
            }
        }catch(Exception $e){
            $response = json_encode([
                'status' => false,
                'response' => $e->getMessage(),
            ]);
        }            echo "<script>alert('$response'); window.location.href = 'settings'</script>";

    }
?>