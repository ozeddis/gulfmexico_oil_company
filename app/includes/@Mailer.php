<?php 

    class MailDataConnect
    {
        private $conn;

        public function __construct($connection)
        {
            $this->conn = $connection;
        }

        public function getDomainData($domain)
        {
            try {
                $query = $this->conn->prepare("SELECT * FROM mail_auth_data WHERE domain = ?");
                $query->execute(array($domain));

                if ($query->rowCount() > 0) {
                    return $query->fetch(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
            return null; // Return null if no data found or an error occurred
        }

        public function fetchDomainAssoc($domain)
        {
            $domainData = $this->getDomainData($domain);
            if ($domainData !== null) {
                return [
                    'host' => $domainData['host'],
                    'smtpAuth' => $domainData['smtp_auth'],
                    'smtpUsername' => $domainData['username'],
                    'password' => $domainData['password'],
                    'smtpSecure' => $domainData['smtp_secure'],
                    'port' => $domainData['port'],
                    'setFrom' => $domainData['set_from'],
                    'addReplyTo' => $domainData['add_replyto'],
                    'cName' => $domainData['name'],
                ];
            }
            return null; //if result is empty
        }
    }
    $madr = new MailDataConnect($conn);
    $domain = $_SERVER['HTTP_HOST'];
    $fetchDomainAssoc = $madr->fetchDomainAssoc($domain);
    // Check if domain data is found
    if ($fetchDomainAssoc !== null) {
        $host = $fetchDomainAssoc['host'];
        $smtpAuth = $fetchDomainAssoc['smtpAuth'];
        $smtpUsername = $fetchDomainAssoc['smtpUsername'];
        $password = $fetchDomainAssoc['password'];
        $smtpSecure = $fetchDomainAssoc['smtpSecure'];
        $port = $fetchDomainAssoc['port'];
        $setFrom = $fetchDomainAssoc['setFrom'];
        $addReplyto = $fetchDomainAssoc['addReplyTo'];
        $cName = $fetchDomainAssoc['cName'];
    } else {
        return null;
    }

    class EmailSender
    {
        private $mailer;
        
        public function ___construct()
        {
            $this->mailer = new PHPMailer\PHPMailer\PHPMailer();
            //configuration for SMTP settings and other credentials
            $this->configureMailer();
        }
        private function configureMailer()
        {
            $this->mailer->isSMTP();
            $this->mailer->Host = $host;
            $this->mailer->SMTPAuth = $smtpAuth;
            $this->mailer->Username = $smtpUsername;
            $this->mailer->Password = $password;
            $this->mailer->SMTPSecure = $smtpSecure;
            $this->mailer->Port = $port;
            //add senders details
            $this->mailer->setFrom($setFrom, $cName);
            $this->mailer->addReplyTo($setFrom, $cName);
        }
        public function sendMail($recipient, $subject, $message)
        {   
            //add recipient
            $this->mailer->addAddress($recipient);
            $this->mailer->isHTML(true);
            //set content
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            //send mail
            if($this->mailer->send()){
                return true;
            }else{
                return false;
            }
        }
    }

    $sender = new EmailSender();
    $recipient = 'me@you.org';
    $subject = 'Test';
    $body = 'This is my test mail';
    if($sender->sendMail($recipient, $subject, $body)){
        echo "Email sent";
    }else{
        echo "Failed to send email";
    }
?>